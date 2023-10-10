<?php

function renderHeader(string $content, int $level = 2): string {
    return "<h{$level}>{$content}</h{$level}>";
}