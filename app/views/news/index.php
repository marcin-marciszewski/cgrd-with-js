<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('news_message'); ?>

<div class="news flex-column">
    <?php if (count($data['news']) > 0) : ?>
        <h4>All news</h4>
        <ul>
            <?php
            foreach ($data['news'] as $news) : ?>
                <li class="news-item flex-center universal-size">
                    <div class="news-info news-item-<?= $news->id ?>">
                        <span class="news-info-title"><?= $news->title ?></span>
                        <span class="news-info-description"> <?= $news->description ?></span>
                    </div>
                    <div class="news-actions flex-center">
                        <a class="btn-edit" data-id="<?= $news->id ?>"></a>
                        <form action="<?= URLROOT ?>/news/delete/<?= $news->id ?>" method="POST"><button class="btn-delete" type="submit">Delete</button></form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="news-form">
        <div class="edit-form hide">
            <div class="edit-header flex-center">
                <h4>Edit news</h4>
                <a class="close-edit">Back</a>
            </div>
            <form class="flex-column edit-form" method="POST" action="">
                <input class="input-text universal-size title-edit" required type="text" name="title" id="title">
                <textarea rows="10" class="input-text description-edit" required name="description" id="description" placeholder="Description"></textarea>
                <input class="btn universal-size" type="submit" value="Save">
            </form>
        </div>
        <div class="add-form">
            <h4>Create news</h4>
            <form class="flex-column" action="<?= URLROOT ?>/news/add" method="POST">
                <input class="input-text universal-size" required type="text" name="title" id="title" placeholder="Title">
                <textarea rows="10" class="input-text" required name="description" id="description" placeholder="Description"></textarea>
                <input class="btn universal-size" type="submit" value="Create">
            </form>
        </div>
        <a class="btn universal-size logout-btn" href="<?= URLROOT ?>/users/logout">Logout</a>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>