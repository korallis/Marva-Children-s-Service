# MUVE Children's Services WordPress Website

Modern WordPress website for MUVE Children's Services with playful yet professional design.

## 🚀 Quick Start

### Prerequisites
- Docker Desktop installed and running
- Git installed
- At least 4GB RAM available
- Port 8080 and 8081 available

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd muve-childrens-service
   ```

2. **Create environment file**
   - Copy `.env.example` to `.env` if not already present
   - Update credentials as needed (default credentials work for local development)

3. **Start Docker containers**
   ```bash
   docker-compose up -d
   ```

4. **Access the sites**
   - WordPress: http://localhost:8080
   - phpMyAdmin: http://localhost:8081

5. **Complete WordPress installation**
   - Navigate to http://localhost:8080
   - Follow the WordPress installation wizard
   - Site Title: MUVE Children's Services
   - Admin Username: muve_admin
   - Admin Password: [Choose a strong password]
   - Admin Email: admin@muvechildrensservices.org

## 📁 Project Structure

```
muve-childrens-service/
├── docker-compose.yml     # Docker configuration
├── .env                   # Environment variables (not in git)
├── .gitignore            # Git ignore rules
├── uploads.ini           # PHP upload configuration
├── wp-content/           # WordPress content directory
│   ├── themes/          # Custom themes
│   ├── plugins/         # Plugins
│   └── uploads/         # Media uploads (not in git)
├── mysql-init/          # MySQL initialization scripts
└── docs/                # Project documentation
```

## 🛠 Development Workflow

### Starting Development
```bash
# Start containers
docker-compose up -d

# View logs
docker-compose logs -f wordpress

# Stop containers
docker-compose down
```

### Accessing Containers
```bash
# WordPress container
docker exec -it muve_wordpress bash

# MySQL container
docker exec -it muve_mysql mysql -u root -p
```

### Theme Development
- Custom theme location: `wp-content/themes/muve-theme/`
- Use Docker volumes for live updates
- Changes reflect immediately without container restart

## 🔧 Configuration

### Environment Variables
See `.env` file for configuration options:
- `MYSQL_ROOT_PASSWORD`: MySQL root password
- `MYSQL_DATABASE`: WordPress database name
- `MYSQL_USER`: WordPress database user
- `MYSQL_PASSWORD`: WordPress database password
- `WORDPRESS_DEBUG`: Enable WordPress debug mode

### PHP Configuration
Edit `uploads.ini` to modify:
- Upload file size limits
- Execution time limits
- Memory limits

## 🔒 Security

### Development Environment
- Default credentials are for local development only
- Never commit `.env` file to version control
- Change all passwords before deployment

### Production Considerations
- Use strong passwords
- Enable SSL/HTTPS
- Implement security headers
- Regular backups
- Keep WordPress and plugins updated

## 📦 Plugins

### Essential Plugins (to be installed)
1. **Security**: Wordfence or Sucuri
2. **SEO**: Yoast SEO or Rank Math
3. **Backup**: UpdraftPlus
4. **Performance**: WP Rocket
5. **Forms**: Contact Form 7 or WPForms

## 🎨 Theme Development

### MUVE Custom Theme
Located in `wp-content/themes/muve-theme/`

Features:
- Mobile-first responsive design
- MUVE brand colors and typography
- Accessibility compliant (WCAG AA)
- Performance optimized

## 🐛 Troubleshooting

### Common Issues

1. **Port already in use**
   ```bash
   # Change ports in docker-compose.yml
   ports:
     - "8082:80"  # Change 8080 to 8082
   ```

2. **Permission issues**
   ```bash
   # Fix WordPress permissions
   docker exec muve_wordpress chown -R www-data:www-data /var/www/html
   ```

3. **Database connection errors**
   - Check `.env` file credentials
   - Ensure database container is running
   - Wait for MySQL to fully initialize

### Logs
```bash
# View all logs
docker-compose logs

# WordPress specific logs
docker-compose logs wordpress

# MySQL specific logs
docker-compose logs db
```

## 📝 License

This project is proprietary to MUVE Children's Services.

## 👥 Support

For development support, contact the development team.