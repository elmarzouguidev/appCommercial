<?php


namespace App\Repositories\Document;

use App\Models\Finance\Document;
use App\Repositories\AppRepository;
use Illuminate\Database\Eloquent\Collection;

class DocumentRepository extends AppRepository implements DocumentInterface
{


    private $document;

    private $instance;

    private $options;

    public function __construct(Document $document)
    {
        $this->document = $document;

        $this->options = config('app-config');
    }

    public function __instance(): Document
    {
        if (!$this->instance) {
            $this->instance = $this->document;
        }

        return $this->instance;
    }


    /**
     * @return Ticket[]|Collection|string[]
     */
    public function getDocuments()
    {
        if ($this->useCache()) {
            //dd('oui');
            return $this->setCache()->remember('all_documents_cache', $this->timeToLive(), function () {

                return $this->document->all();
            });
        }
        //dd('nooo');
        return $this->document->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getDocument(int $id)
    {
        return $this->document->find($id);
    }


    public function getDocumentByUuid(string $uuid)
    {
        return $this->document->whereUuid($uuid);
    }

    public function getDocumentById(int $id)
    {
        return $this->document->whereId($id);
    }


    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->document->first();
    }

    public function With(array $with)
    {
        return $this->__instance()->with($with);
    }

    public function Without(array $with)
    {
        return $this->__instance()->without($with);
    }
}
