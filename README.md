
# crud_php

O sisteminha web foi desenvolvido pelo aluno **André Luiz da Silva Santos, RGA: 202111316050**, com o objetivo de concretizar o disposto na avaliação da disciplina de Programação Web 1 disponibilizada pelo curso de Sistemas de Informação do Instituto de Computação da UFMT.**

O sistema apresenta funcionalidades básicas de um CRUD, criação, visualização, edição e exclusão de registros. O sistema de cadastro é composto por 3 tabelas no banco de dados conforme disposto no arquivo ../scriptsBd/init.sql sendo elas usuario, tipoMedicamento e medicamento. A tabela principal é medicamento sendo a tabela usuario utilizada apenas para realizar o login no sistema e poder fazer cadastro, exclusão e edição dos registros, enquanto a tabela tipoMedicamento é uma tabela secundária que serve de campo na tabela principal.

### O sistema é composto de 3 telas principais
	- login (../pages/login.php): É possível realizar o login com seu usuário e senha conforme cadastrado no banco ou clica para ir para tela de visualização dos registros já salvos
	- tela inicial (../pages/home.php): É possível visualizar a lista dos registros salvos no banco, além disso quando logado é possível cadastrar, editar e excluir os registros, sendo possível ainda realizar logoff e visualizar todos os campos do registro (funcionalidade que já é possível utilizar mesmo sem fazer login)
	- tela de cadastro, edição e visualização (../pages/operacoes-medicamento.php): É a tela de cadastro dos medicamentos, tendo a funcionalidade de exibição quando modo é igual a DSP, edição quando modo é igual a UPD e inserção quando modo é igual a INS. No modo exibição os campos são desabilitados e tirado a visibilidade do botão submit.
	
### O sistema possui alguns componentes e telas de execução
	- Cabecalho (../component/cabecalho.php): O cabeçalho é o mesmo presente em todas as telas do sistema, tela como funções voltar a tela inicial, sair ou cadastrar medicamento quando logado, e fazer login quando não conectado.
	- Processemento do sistema (..includes): Todos os arquivos de processamento estão na pasta include, os documentos ali são responsáveis por fazer a conexão com o banco de dados além de inserir, deletar, editar e puxar os dados do banco de dados.

### Contato: 
   andre.santos2@sou.ufmt.br
	 andreluizsilvasantoss.al@gmail.com

