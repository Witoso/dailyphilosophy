<?php
namespace DailyPhilosophy\Interfaces;


interface Article
{
  public function getTitle(): string;
  public function getIntro(): string;
  public function getUrl(): string;
  public function downloadArticle();
}
