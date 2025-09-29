<div>
    <a href="posts/new" type="button" class="btn btn-primary">Add a Post</a>
</div>

<?php foreach ($posts as $post): ?>

    <div class="col-md-12 blog-post row">
        <div class="post-title">
            <a href="?posts=show&id=<?php echo $post['id'] ?>">
                <h1>
                    <?php echo $post['title'] ?>
                </h1>
            </a>
        </div>
        <div class="post-info">
            <span><?php echo \Core\Helpers\formatDate($post['created_at']) ?></span> | <span><?php echo $post['category_name'] ?></span>
        </div>
        <p>
            <?php echo \Core\Helpers\truncate($post['text']) ?>
        </p>
        <a
            href="?posts=show&id=<?php echo $post['id'] ?>"
            class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>
    </div>

<?php endforeach ?>