from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_migrate import Migrate
from app.config import config, basedir


db = SQLAlchemy()


def create_app():
    app = Flask(__name__)
    app.config.from_object(config)

    # db
    db.init_app(app)
    migrate = Migrate()
    
    from app.posts.models import Post
    migrate.init_app(app, db, directory=basedir / 'app'/ 'migrations')

    # views
    from app.main.errors import page_not_found, internal_server_error
    app.register_error_handler(404, page_not_found)
    app.register_error_handler(500, internal_server_error)

    from app.posts import bp as posts_views
    app.register_blueprint(posts_views)

    return app
