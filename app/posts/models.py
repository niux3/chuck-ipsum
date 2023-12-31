from app import db


class Post(db.Model):
    __tablename__ = 'posts'
    id = db.Column(db.Integer, primary_key=True)
    content = db.Column(db.String)
    
    def __str__(self):
        return '(%s) %s' % (self.id, self.content)
