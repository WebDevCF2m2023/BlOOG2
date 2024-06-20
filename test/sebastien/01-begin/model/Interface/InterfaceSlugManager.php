<?php

namespace model\Interface;
interface InterfaceSlugManager
{
    public function selectOneBySlug(string $slug): object;
}