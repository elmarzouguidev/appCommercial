<?php


namespace App\Repositories\Document;

interface DocumentInterface
{

    public function getDocuments();

    public function getDocument(int $id);

    public function getDocumentByUuid(string $uuid);

    public function getDocumentById(int $id);

    public function getFirst();

    public function With(array $with);

    public function Without(array $with);
}
