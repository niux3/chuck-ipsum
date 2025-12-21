import os
from pathlib import Path
from dotenv import load_dotenv


load_dotenv()
basedir = Path(__file__).resolve().parent.parent


class Config:
    FLASK_APP = os.getenv('FLASK_APP')
    SECRET_KEY = os.getenv('SECRET')
    MAIL_SERVER = os.getenv('MAIL_SERVER', 'smtp.googlemail.com')
    MAIL_PORT = os.getenv('MAIL_PORT', 587)
    # MAIL_USE_TLS = os.environ.get('MAIL_USE_TLS', 'true').lower() in ['true', 'on', '1']
    MAIL_USERNAME = os.getenv('MAIL_USERNAME')
    MAIL_PASSWORD = os.getenv('MAIL_PASSWORD')
    SQLALCHEMY_TRACK_MODIFICATIONS = False
    SQLALCHEMY_DATABASE_URI = 'sqlite:///%s' % str(basedir / 'app' / 'data' / os.getenv('DATABASE_URL'))

    @staticmethod
    def init_app(app):
        print(f"config {os.getenv('FLASK_ENV')} loaded")


class DevelopmentConfig(Config):
    DEBUG = os.getenv('FLASK_DEBUG')


class TestingConfig(Config):
    TESTING = os.getenv('TESTING')
    DEBUG = os.getenv('FLASK_DEBUG')


class ProductionConfig(Config):
    DEBUG = 0


config_list = {
    'development': DevelopmentConfig,
    'testing': TestingConfig,
    'production': ProductionConfig,
}
config = config_list[os.getenv('FLASK_ENV')]
