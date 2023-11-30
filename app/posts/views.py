from random import randint
from flask import render_template, request
from app.posts import bp
from app.posts.models import Post
from app import db

@bp.route('/')
def index():
    ctx = {"rows": ''}
    fields = ['sentence_min', 'sentence_max', 'paragraph']
    min, max, paragraph = fields
    if len(request.args) > 0 and all([True if int(v) > 0 and k in fields else False for k, v in request.args.items()]):
        results = []
        min = int(request.args.get(min))
        max = int(request.args.get(max))
        paragraph = int(request.args.get(paragraph))
        for _ in range(paragraph):
            row = []
            limit_params = randint(min, max)
            offset_params = randint(0, 9600 - max)
            query = Post.query.limit(limit_params).offset(offset_params).all()
            
            for r in query:
                row.append(r.content)
            results.append(" ".join(row))
        ctx['rows'] = results
    return render_template('posts/index.html', **ctx)