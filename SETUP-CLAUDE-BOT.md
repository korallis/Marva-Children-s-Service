# Setting Up Claude GitHub Bot

## Installation Steps

1. **Visit the Claude for GitHub App**:
   - Go to: https://github.com/apps/claude-for-github
   - Or search "Claude for GitHub" in GitHub Marketplace

2. **Install the App**:
   - Click "Install" or "Configure"
   - Select your account: `korallis`
   - Choose "Only select repositories"
   - Select: `Marva-Children-s-Service`
   - Review and accept permissions

3. **Configuration**:
   The bot will be active immediately after installation.

## Usage

### In Pull Requests
- Claude will automatically review new PRs
- Comment `@claude-ai review` for additional review
- Ask specific questions: `@claude-ai explain this function`

### In Issues
- Add `claude` label to get AI assistance
- Mention `@claude-ai` in comments

### Available Commands
- `@claude-ai review` - Code review
- `@claude-ai explain` - Code explanation
- `@claude-ai suggest` - Implementation suggestions
- `@claude-ai test` - Test suggestions
- `@claude-ai docs` - Documentation help

## Repository Context

The `.github/claude-instructions.md` file provides Claude with context about:
- WordPress development standards
- MUVE Children's Services requirements
- Project structure and conventions

## Troubleshooting

If Claude doesn't respond:
1. Check if the app is installed on the repository
2. Ensure you're using the correct mention format
3. Check GitHub Actions tab for any errors

## Next Steps

After pushing to GitHub:
1. Install the Claude bot following these instructions
2. Create a test PR to verify it's working
3. The bot will automatically review future PRs