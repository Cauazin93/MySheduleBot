Documentação *SIMPLES*


# Estrutura da Pasta e Descrição dos Arquivos

## Arquivos fora das pastas
- **conecta.php**: Realiza as conexões com o banco de dados e PHP.

- **style.css**: Utilizado para estilizar os arquivos PHP e HTML.

- **preenche_datas.php**: Script utilizado para adicionar as datas e horários ao banco de dados, utilizado apenas uma vez.

- **login.php**: Verifica o usuário e senha a partir do banco de dados.

- **login.html**: Página de login com campos para usuário e senha.

## Pasta `visualiza`
- **visualiza_consulta.php**: Utilizado para visualizar as consultas marcadas no banco de dados.

## Pasta `pages2`
- **cadastraConsulta.php**: Realiza o cadastro da consulta e envia os dados para o banco de dados.

- **Cadastrar_Consulta.php**: Interface visual para o `cadastraConsulta.php`.

- **CadastraPaciente.php**: Realiza o cadastro do paciente.

- **Cadastrar_paciente.php**: Interface visual para o `CadastraPaciente.php`.

- **Cpf.php**: Página para inserir o CPF do paciente.

- **verificaCPF.php**: Verifica se o CPF do paciente já existe no banco de dados.

## Outras pastas com funções explícitas

- **pages/**: Interface principal do site.

- **forms/**: Contém os formulários em PHP para cadastrar médico, paciente e consulta.

- **deleta/**: Sistema para excluir informações do banco de dados.

- **cancelat/**: Códigos PHP para cancelar uma consulta cadastrada, link utilizado pelo chatbot externo.

- **Cadastra.php/**: Envia as informações dos formulários da pasta `forms` para o banco de dados.

- **BD/**: Contém o banco de dados.