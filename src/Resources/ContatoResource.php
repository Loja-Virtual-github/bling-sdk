<?php

namespace LojaVirtual\Bling\Resources;

use GuzzleHttp\Exception\GuzzleException;
use LojaVirtual\Bling\Exceptions\BlingException;
use LojaVirtual\Bling\Exceptions\InvalidEndpointException;
use LojaVirtual\Bling\Exceptions\InvalidJsonException;
use LojaVirtual\Bling\Exceptions\InvalidXmlException;
use LojaVirtual\Bling\Request\HttpMethodsEnum;
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

    /**
     * Busca um contato específico
     *
     * @return object
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function fetch(): object
    {
        $options = $this->getOptions();

        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::GET->value,
                ContatoRoute::fetch(...$this->getOptions()),
                array(
                    'identificador' => $this->getTipoIdentificador($options[0])
                )
            );

        $responseParsed = $this->parseResponse($response, 'contatos');
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

    /**
     * Retorna todos os contatos
     *
     * @return array
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function fetchAll(): array
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::GET->value,
                ContatoRoute::fetchAll()
            );

        $responseParsed = $this->parseResponse($response, 'contatos');
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
                HttpMethodsEnum::POST->value,
                ContatoRoute::insert(),
                array(
                    'xml' => $this->payloadToXML($params, 'contato')
                )
            );

        $responseParsed = $this->parseResponse($response, 'contatos');
        return $responseParsed->contatos->contato;
    }

    /**
     * Atualiza um contato
     *
     * @param array $params
     * @return object
     * @throws BlingException
     * @throws GuzzleException
     * @throws InvalidJsonException
     * @throws InvalidXmlException
     */
    public function update(array $params): object
    {
        $response = $this->request
            ->sendRequest(
                HttpMethodsEnum::PUT->value,
                ContatoRoute::update(...$this->getOptions()),
                array(
                    'xml' => $this->payloadToXML($params, 'contato')
                )
            );

        $responseParsed = $this->parseResponse($response, 'contatos');
        return $responseParsed->contatos->contato;
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