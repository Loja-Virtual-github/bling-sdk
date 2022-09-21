## Bling SDK

- [x] Implementar padrão da SDK
- [X] Implementar CRUD de categoria
    - [X] INSERT
    - [X] UPDATE
    - [X] FETCH
    - [X] FETCH ALL

- [X] Implementar CRUD de categoria loja
    - [X] INSERT
    - [X] UPDATE
    - [X] FETCH
    - [X] FETCH ALL

- [X] Implementar CRUD de campo customizado
    - [X] INSERT
    - [X] UPDATE
    - [X] FETCH
    - [X] FETCH ALL

- [X] Implementar CRUD de contato
    - [X] INSERT
    - [X] UPDATE
    - [X] FETCH
    - [X] FETCH ALL

- [ ] Implementar CRUD de nota fiscal
    -  [ ] INSERT
    -  [ ] UPDATE
    -  [ ] FETCH
    -  [ ] FETCH ALL

-  [ ] Implementar CRUD de pedido
    -  [ ] INSERT
    -  [ ] UPDATE
    -  [ ] FETCH
    -  [ ] FETCH ALL

- [X] Implementar CRUD de produto
    - [X] INSERT
    - [X] UPDATE
    - [X] FETCH
    - [X] FETCH ALL

- [ ] Implementar CRUD de produto loja
    - [ ] INSERT
    - [ ] UPDATE
    - [ ] FETCH
    - [ ] FETCH ALL

- [X] Implementar CRUD de situacao
    - [X] INSERT
    - [X] UPDATE
    - [X] FETCH
    - [X] FETCH ALL

- [X] Refatorar os endpoints nas rotas por causa da abstracao do Id da Loja no Bling::client()
- [X] Fazer a busca de vinculos de loja montarem a query com parametro loja
- [ ] Fazer o fetchAll já retornar os dados paginados com recursão (https://ajuda.bling.com.br/hc/pt-br/articles/360046302394-Limites)
- [X] Tratar para que as requests tenham um sleep de 1 segundos depois da execução
- [X] Fazer a instância do Guzzle ser passada por injeção de dependência para refatorarmos os testes
- [ ] Fazer os testes com stubs que verificam as chamadas de métodos
- [ ] Mover os testes de resources para um suíte de teste de integração
- [X] Criar abstração para tratamento de resposta por resource
- [X] Alterar os resources já implementados para usar a abstração de respostas de resources
- [X] Criar factory para retornar a rota baseada no resource