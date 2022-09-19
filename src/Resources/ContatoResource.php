<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use LojaVirtual\Bling\Request\Request;
use LojaVirtual\Bling\Routes\ContatoRoute;

class ContatoResource extends AbstractResource implements ResourceInterface
{
    /**
     * Tipo de identificador para buscar um contato
     */
    protected const TIPO_IDENTIFICADO = [
        'cpf_cnpj' => '1',
        'id' => '2'
    ];

    public function fetch(): object
    {
        $options = $this->getOptions();

        $response = $this->request
            ->sendRequest(
                Request::GET,
                ContatoRoute::fetch(...$this->getOptions()),
                array(
                    'identificador' => $this->getTipoIdentificador($options[0])
                )
            );

        $responseParsed = $this->parseResponse($response);
        return $responseParsed->contatos[0]->contato;
    }

    /**
     * Retorna o tipo de identificador
     *
     * @param mixed $identificador
     * @return int
     */
    public function getTipoIdentificador(mixed $identificador): int
    {
        return is_numeric($identificador)
            ? self::TIPO_IDENTIFICADO['id']
            : self::TIPO_IDENTIFICADO['cpf_cnpj'];
    }

    public function fetchAll(): array
    {
        $response = $this->request
            ->sendRequest(
                Request::GET,
                ContatoRoute::fetchAll()
            );

        $responseParsed = $this->parseResponse($response);
        return $this->unwrapFetchAll($responseParsed->contatos, 'contato');
    }

    /**
     * Inserir um novo contato
     *
     * @param array $params
     * @return object
     * @throws GuzzleException
     * @throws BlingException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function insert(array $params): object
    {
        $response = $this->request
            ->sendRequest(
                Request::POST,
                ContatoRoute::insert(),
                array(
                    'xml' => $this->payloadToXML($params, 'contato')
                )
            );

        $responseParsed = $this->parseResponse($response);
        return $responseParsed->contatos->contato;
    }

    public function update(array $params): object
    {
        $response = $this->request
            ->sendRequest(
                Request::PUT,
                ContatoRoute::update(...$this->getOptions()),
                array(
                    'xml' => $this->payloadToXML($params, 'contato')
                )
            );

        $responseParsed = $this->parseResponse($response);
        return $responseParsed->contatos->contato;
    }

    /**
     * Substitui os campos alterados no objeto original
     *
     * @param object $origin
     * @param array $update
     * @return array
     */
    public function parseUpdateParams(object $origin, array $update): array
    {
        foreach ($update as $field => $value) {
            if (is_array($value)) {
                return $this->parseUpdateParams($origin->{$field}, $update[$field]);
            }

            $origin->{$field} = $value;
        }

        $origin = json_encode($origin);
        return json_decode($origin, true);
    }

    /**
     * [INDISPONÍVEL] Deletar um contato
     *
     * @return void
     * @throws InvalidEndpointException
     */
    public function delete(): void
    {
        throw new InvalidEndpointException("Esta funcionalidade está indisponível.");
    }
}