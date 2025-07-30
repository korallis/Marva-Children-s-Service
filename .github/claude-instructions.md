# Claude GitHub Bot Instructions

## Overview

This repository uses Claude as an AI assistant for code reviews, documentation, and development assistance.

## How to Install Claude GitHub Bot

1. **Install the Claude for GitHub App**:
   - Visit: https://github.com/apps/claude-for-github
   - Click "Install" or "Configure"
   - Select your organization/account
   - Choose "Only select repositories" and select `Marva-Children-s-Service`
   - Grant the necessary permissions

2. **Configuration**:
   - The bot will automatically respond to:
     - Pull request reviews
     - Issues with the `claude` label
     - Comments that mention `@claude-ai`

## Using Claude in This Repository

### For Pull Requests

Claude will automatically review PRs and check for:
- WordPress coding standards
- Security vulnerabilities
- Performance issues
- Accessibility concerns
- Best practices

To request a specific review, comment:
```
@claude-ai please review this PR focusing on [specific area]
```

### For Issues

Add the `claude` label to get AI assistance with:
- Bug investigation
- Feature implementation suggestions
- Code examples

### Commands

- `@claude-ai review` - Request a code review
- `@claude-ai explain` - Ask for explanation of code
- `@claude-ai suggest` - Get implementation suggestions
- `@claude-ai test` - Request test case suggestions
- `@claude-ai docs` - Ask for documentation help

## Repository-Specific Context

Claude has been configured to understand:
- This is a WordPress site for MUVE Children's Services
- We use Docker for local development
- The custom theme is located in `wp-content/themes/muve-theme`
- We follow WordPress coding standards
- The site focuses on children's services with accessibility as a priority

## Best Practices

1. **Be Specific**: The more context you provide, the better Claude's responses
2. **Code Context**: Include relevant code snippets in your questions
3. **Follow Up**: If Claude's response needs clarification, ask follow-up questions
4. **Security**: Never share sensitive data like passwords or API keys

## Limitations

- Claude cannot:
  - Make direct code changes (only suggestions)
  - Access external services or APIs
  - Run code or tests directly
  - Access private repository data

## Support

For issues with the Claude bot:
- Check: https://github.com/apps/claude-for-github
- Contact: GitHub support

For repository-specific questions:
- Create an issue with the `question` label