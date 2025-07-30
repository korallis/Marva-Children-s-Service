# MUVE Children's Services WordPress Website

![CI](https://github.com/korallis/Marva-Children-s-Service/workflows/CI/badge.svg)
![WordPress](https://img.shields.io/badge/WordPress-6.7+-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.3+-purple.svg)
![License](https://img.shields.io/badge/license-proprietary-red.svg)

Modern WordPress website for MUVE Children's Services with playful yet professional design, optimized for accessibility and performance.

## 🌟 Features

- **Custom WordPress Theme**: Responsive, accessible, and optimized for performance
- **Service Management**: Custom post types for Services, Team Members, Testimonials, and Resources
- **Docker Development**: Consistent development environment across all platforms
- **Modern Build Process**: Laravel Mix for asset compilation
- **Security First**: Wordfence, security headers, and best practices
- **SEO Optimized**: Yoast SEO integration
- **Performance**: W3 Total Cache and optimized images

## 🚀 Quick Start

### Prerequisites

- Docker Desktop
- Git
- Node.js 18+
- At least 4GB RAM

### Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/korallis/Marva-Children-s-Service.git
   cd Marva-Children-s-Service
   ```

2. **Start Docker containers**
   ```bash
   docker-compose up -d
   ```

3. **Run setup scripts**
   ```bash
   ./setup-wordpress.sh
   ./wp-cli-setup.sh
   ./install-plugins.sh
   ./activate-theme.sh
   ```

4. **Access the sites**
   - Frontend: http://localhost:8080
   - Admin: http://localhost:8080/wp-admin
   - phpMyAdmin: http://localhost:8081

## 🛠 Development

### Theme Development

```bash
cd wp-content/themes/muve-theme
npm install
npm run dev     # Development build with hot reload
npm run build   # Production build
```

### Project Structure

```
├── .github/            # GitHub Actions and templates
├── wp-content/
│   ├── themes/
│   │   └── muve-theme/ # Custom theme
│   ├── plugins/        # WordPress plugins
│   └── uploads/        # Media files (git ignored)
├── docker-compose.yml  # Docker configuration
└── docs/              # Project documentation
```

## 🤖 AI Integration

This repository uses Claude AI for:
- Automated code reviews
- Development assistance
- Documentation help

See [Claude Instructions](.github/claude-instructions.md) for details.

## 🔄 GitHub Actions

- **CI Pipeline**: Runs on all PRs and pushes
- **Security Scans**: Automated vulnerability scanning
- **Dependency Updates**: Automated via Dependabot
- **Deployment**: Automated deployment workflows

## 🧪 Testing

```bash
# PHP syntax check
find wp-content/themes/muve-theme -name "*.php" -exec php -l {} \;

# Run theme tests
cd wp-content/themes/muve-theme
npm test
```

## 📚 Documentation

- [Project Brief](docs/project-brief.md)
- [Product Requirements](docs/prd.md)
- [Sprint Plan](docs/wordpress-sprint-plan.md)
- [Test Report](test-report.md)

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Coding Standards

- Follow [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- Use meaningful commit messages
- Write tests for new features
- Ensure all tests pass before submitting PR

## 🔒 Security

- Report security vulnerabilities to: security@muvechildrensservices.org
- Do not create public issues for security problems
- Follow responsible disclosure practices

## 📄 License

This project is proprietary to MUVE Children's Services. All rights reserved.

## 👥 Team

- Development: [@korallis](https://github.com/korallis)
- AI Assistant: Claude

## 📞 Support

For development support, please create an issue in this repository.

---

Built with ❤️ for MUVE Children's Services