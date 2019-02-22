<?php
function cssClasses()
{
    $out      = '';
    $page     = wire('page');
    $language = wire('user')->language->name;
    $classes  = array();

    //get the segments
    if ($page->id == 1) {
        if ($page->path != "/") {
            $segment1  = str_replace('/', '', $page->path);
            $classes[] = "homepage-$segment1";
        } else {
            $classes[] = "homepage";
        }
    } else {
        $segments = array();
        $segments = explode(" ", trim(str_replace("/", " ", $page->path)));
        foreach ($segments as $segment) {
            $classes[] = (is_numeric(substr($segment, 0, 1))) ? 'n' . $segment : $segment;
        }
    }
    $classes[] = "page-$page->id";
    $classes[] = ($page->id != 1) ? "page-$page->name" : "page-home";
    $classes[] = ($page->rootParent->id != 1) ? "section-{$page->rootParent->name}" : "";
    $classes[] = "template-" . $page->template->name;
    $classes[] = "language-" . $language;

    $out = implode(' ', $classes);
    return $out;
}
