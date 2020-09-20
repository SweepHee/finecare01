<div id="main__index" class="uk-container">
    <ul class="ul-list">
        <?php foreach($posts as $post) : ?>
        <li>
            <article class="uk-article">
                <h1 class="uk-article-title">
                    <a href="/posts/<?=$post->id?>" class="uk-link-reset"><?=$post->title?></a>
                </h1>
                <div class="uk-text-meta">by <?=$post->getUsername()?></div>
                <p class="class"><?=$post->getSummary()?></p>
                <div class="uk-text-meta"><?=$post->getCreatedAt()?></div>
            </article>
        </li>
        <?php endforeach ?>
    </ul>
</div>
<button id="readmore" class="uk-button uk-button-default">Read More</button>
