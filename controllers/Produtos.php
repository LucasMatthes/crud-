<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {	
	
	//Página de listar produtos
	public function index()
	{					
		//Carrega o Model Produto
		$this->load->model('produtos_model', 'produtos');			

		//Criamos um Array dados para armazenas os produtos
		//Executamos a função no produtos_model getProdutos
		$data['produtos'] = $this->produtos->getProdutos();

		//Carregamos a view listarprodutos e passamos como parametro a array produtos que guarda todos os produtos da db produtos
		$this->load->view('listarprodutos', $data);
	}


	//Página de adicionar produto
	public function add()
	{	
		//Carrega o Model Produtos				
		$this->load->model('produtos_model', 'produtos');					

		//Carrega a View
		$this->load->view('addprodutos');
	}



	//Página de editar produto
	public function editar($id=NULL)	
	{						
		//Verifica se foi passado um ID, se não vai para a página listar produtos
		if($id == NULL) {
			redirect('../../crud/produtos');
		}

		//Carrega o Model Produtos				
		$this->load->model('produtos_model', 'produtos');

		//Faz a consulta no banco de dados pra verificar se existe
		$query = $this->produtos->getProdutoByID($id);

		//Verifica que a consulta voltar um registro, se não vai para a página listar produtos
		if($query == NULL) {
			redirect('../../crud/produtos');
		}
		
		//Criamos uma array onde vai guardar os dados do produto e passamos como parametro para view;	
		$dados['produto'] = $query;

		//Carrega a View
		$this->load->view('editarprodutos', $dados);		
	}

	//Função salvar no DB
	public function salvar()
	{
		//Verifica se foi passado o campo nome vazio.
		if ($this->input->post('nome') == NULL && $this->input->post('id') == NULL) {
			echo 'O compo nome do produto é obrigatório.';
			echo '<a href="../produtos/add" title="voltar">Voltar</a>';
		} else if ($this->input->post('nome') == NULL && $this->input->post('id') != NULL) {
			echo 'O compo nome do produto é obrigatório.';
			echo '<a href="../produtos/editar/' .  $this->input->post('id') . '" title="voltar">Voltar</a>';
		} else {
			//Carrega o Model Produtos				
			$this->load->model('produtos_model', 'produtos');

			//Pega dados do post e guarda na array $dados
			$dados['nome'] = $this->input->post('nome');
			$dados['preco'] = $this->input->post('preco');
			$dados['ativo'] = $this->input->post('ativo');		
						
			//Verifica se foi passado via post a id do produtos
			if ($this->input->post('id') != NULL) {		
				//Se foi passado ele vai fazer atualização no registro.	
				$this->produtos->editarProduto($dados, $this->input->post('id'));
			} else {
				//Se Não foi passado id ele adiciona um novo registro
				$this->produtos->addProduto($dados);
			}	
						
			//Fazemos um redicionamento para a página 		
			redirect("../../crud/produtos");	
		}		
	}

	//Função Apagar registro
	public function apagar($id=NULL)
	{
		//Verifica se foi passado um ID, se não vai para a página listar produtos
		if($id == NULL) {
			redirect('../../crud/produtos');
		}

		//Carrega o Model Produtos				
		$this->load->model('produtos_model', 'produtos');

		//Faz a consulta no banco de dados pra verificar se existe
		$query = $this->produtos->getProdutoByID($id);

		//Verifica se foi encontrado um registro com a ID passada
		if($query != NULL) {
			
			//Executa a função apagarProdutos do produtos_model
			$this->produtos->apagarProduto($query->id);
			redirect('../../crud/produtos');

		} else {
			//Se não encontrou nenhum registro no banco de dados com a ID passada ele volta para página listar produtos
			redirect('../../crud/produtos');
		}	
	}

	//Função mudar status do produto
	public function status($id=NULL)
	{

		//Verifica se foi passado um ID, se não vai para a página listar produtos
		if($id == NULL) {
			redirect('../../crud/produtos');
		}

		//Carrega o Model Produtos				
		$this->load->model('produtos_model', 'produtos');

		//Faz a consulta no banco de dados pra verificar se existe
		$query = $this->produtos->getProdutoByID($id);

		//Verifica se foi encontrado um registro com a ID passada
		if($query != NULL) {
			
			//Verifica se o produtos está ativo ou inativo para poder mudar o status do mesmo.
			if ($query->ativo == 1) {
				$dados['ativo'] = 0;
			} else {
				$dados['ativo'] = 1;
			}

			//Executa a função do produtos_model statusProduto
			$this->produtos->statusProduto($dados, $query->id);
			redirect('../../crud/produtos');


		} else {
			//Se não encontrou nenhum registro no banco de dados com a ID passada ele volta para página listar produtos
			redirect('../../crud/produtos');
		}

	}
	public function visualiza($id=NULL){
		//Verifica se foi passado um ID, se não vai para a página listar produtos
		if($id == NULL) {
			redirect('../../crud/produtos');
		}

		//Carrega o Model Produtos				
		$this->load->model('produtos_model', 'produtos');

		//Faz a consulta no banco de dados pra verificar se existe
		$query = $this->produtos->getProdutoByID($id);

		//Verifica que a consulta voltar um registro, se não vai para a página listar produtos
		if($query == NULL) {
			redirect('../../crud/produtos');
		}
		
		//Criamos uma array onde vai guardar os dados do produto e passamos como parametro para view;	
		$dados['produto'] = $query;

		//Carrega a View
		$this->load->view('detalhesproduto', $dados);
	}
		
}