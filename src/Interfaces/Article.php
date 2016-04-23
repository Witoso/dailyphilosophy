<?php

interface Article
{
  public function showIntro(): string {}
  public function showTOC(): string {}
  public function downloadArticle(){}
}
