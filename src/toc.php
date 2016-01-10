<article>
    <h1>Table of Contents</h1>
    <ul>
    <?php
    foreach ($tableOfContents as $title=>$link) {
        if ($link == '/chapter-1' || $link == '/chapter-24') echo '<ul>';
        printf('<li><a href="%s">%s</a></li>', $link, $title);
        if ($link == '/chapter-23' || $link == '/chapter-33') echo '</ul>';
    }
    ?>
    </ul>
</article>