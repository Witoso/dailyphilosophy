<?php
namespace DailyPhilosophy\Interfaces;


interface Article
{
    public function downloadArticle();

    public function jsonSerialize();
}
