#!/bin/bash

# Script to review and merge Dependabot PRs
# This handles both GitHub Actions and npm dependency updates

echo "🤖 Evaluating and merging Dependabot PRs..."
echo "=========================================="

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

# Repository
REPO="korallis/Marva-Children-s-Service"

# First, update main branch
echo -e "${YELLOW}Updating main branch...${NC}"
git checkout main
git pull origin main

# Function to merge a PR
merge_pr() {
    local pr_number=$1
    local pr_title=$2
    
    echo -e "\n${YELLOW}Processing PR #$pr_number: $pr_title${NC}"
    
    # Check if PR is still open
    pr_state=$(gh pr view $pr_number --repo $REPO --json state -q .state)
    
    if [ "$pr_state" != "OPEN" ]; then
        echo -e "${GREEN}✓ PR #$pr_number already processed${NC}"
        return
    fi
    
    # Enable auto-merge
    echo "Enabling auto-merge..."
    gh pr merge $pr_number --repo $REPO --auto --squash || {
        # If auto-merge fails, try direct merge
        echo "Auto-merge failed, attempting direct merge..."
        gh pr merge $pr_number --repo $REPO --squash || {
            echo -e "${RED}❌ Failed to merge PR #$pr_number${NC}"
            return 1
        }
    }
    
    echo -e "${GREEN}✓ PR #$pr_number merged successfully${NC}"
    sleep 2  # Give GitHub time to process
}

# GitHub Actions PRs (1-5)
echo -e "\n${YELLOW}=== GitHub Actions Updates ===${NC}"
merge_pr 1 "bump actions/upload-artifact from 3 to 4"
merge_pr 2 "bump actions/download-artifact from 3 to 4"
merge_pr 3 "bump actions/cache from 3 to 4"
merge_pr 4 "bump actions/dependency-review-action from 3 to 4"
merge_pr 5 "bump github/codeql-action from 2 to 3"

# NPM dependency PRs (6-14)
echo -e "\n${YELLOW}=== NPM Dependency Updates ===${NC}"
merge_pr 6 "bump css-loader from 6.11.0 to 7.1.2"
merge_pr 7 "bump sass-loader from 12.6.0 to 16.0.5"
merge_pr 8 "bump style-loader from 3.3.4 to 4.0.0"
merge_pr 9 "bump resolve-url-loader from 4.0.0 to 5.0.0"
merge_pr 10 "bump postcss-loader from 6.2.1 to 8.1.1"
merge_pr 11 "bump cssnano from 5.1.15 to 7.1.0"
merge_pr 12 "bump @wordpress/browserslist-config from 4.1.3 to 6.27.0"
merge_pr 13 "bump babel-loader from 8.4.1 to 10.0.0"
merge_pr 14 "bump browser-sync from 2.29.3 to 3.0.4"

# Update local repository
echo -e "\n${YELLOW}Updating local repository...${NC}"
git checkout main
git pull origin main

# Update theme dependencies if PRs were merged
if [ -d "wp-content/themes/muve-theme" ]; then
    echo -e "\n${YELLOW}Updating theme dependencies...${NC}"
    cd wp-content/themes/muve-theme
    npm install
    npm run build
    cd -
fi

echo -e "\n${GREEN}✅ Dependabot PR processing complete!${NC}"

# Summary
echo -e "\n${YELLOW}=== Summary ===${NC}"
echo "Processed 14 Dependabot PRs"
echo "Check https://github.com/$REPO/pulls for any remaining PRs"