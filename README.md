# PDWEL-TrabFinal-PadawansTeam

Trabalho final da matéria "Programação dinâmica para Web" do professor Ugo Henrique Pereira da Silva.

Integrantes da equipe e suas respectivas matrículas:

* Gabriela Viana Bilinski – SP3026868
* João Victor Teixeira de Oliveira – SP3030644
* Juliana Macedo Santiago – SP3032337
* Marivaldo Junior Torres – SP3024792
* Renan Coelho Santos – SP3024156


### **SOBRE O PROJETO** 
*** 
Este projeto CRUD é um site desenvolvido com a arquitetura MVC utilizando a linguagem PHP com o framework Bootstrap para a criação de uma interface agradável para o usuário. Na página "Home" é possível visualizar todas as publicações feitas pelos usuários no site, enquanto em "Sobre" é possível visualizar uma página que contém mais informações sobre o projeto. Ao clicar em uma determinada publicação, é possível visualizar seu conteúdo e uma lista de comentários caso ela possua, além de possuir um campo para a inserção de comentários. Ainda no header é possivel visualizar um link para a página "Admin", onde é possível alterar e excluir publicações inseridas no banco de dados.


### INSTALAÇÃO DO XAMPP
*** 

Para o correto deploy do projeto, é necessário instalar o XAMPP.

<h4> Windows </h4>

Para a instalação no Windows, siga os passos fornecidos pelo instalador, sem a necessidade de realizar alguma configuração específica. O instalador para o Windows está disponível em: https://www.apachefriends.org/xampp-files/8.0.12/xampp-windows-x64-8.0.12-0-VS16-installer.exe


<h4> Linux </h4>

Para a instalação e a execução do XAMPP em alguma distribuição Linux, execute os seguintes comandos:

* wget https://ufpr.dl.sourceforge.net/project/xampp/XAMPP%20Linux/7.4.11/xampp-linux-7.4.11-0-installer.run -O xampp-installer.run
* wget "https://sourceforge.net/projects/xampp/files/XAMPP%20Linux/7.4.22/xampp-linux-x64-7.4.22-0-installer.run/download" -O xampp-installer.run
* chmod +x xampp-installer.run
* sudo ./xampp-installer.run (siga a instalação padrão)
* cd /opt/lampp
* chmod +777 manager-linux-x64.run
* ./manager-linux-x64.run


### BANCO DE DADOS
***

Nâo é necessária a criação de um banco de dados, uma vez que o próprio código do projeto já cria uma base de dados com as tabelas necessárias para o funcionamento correto da aplicação.

### PASTA HTDOCS
***

Para que a aplicação funcione corretamente, é preciso que a pasta "mvc-site" deste repositório se encontre na pasta "htdocs" localizada dentro da pasta do XAMPP.

<h4> Windows </h4>

Caso não tenha sido feita nenhuma alteração na instalação no Windows, a pasta "htdocs" se encontra no seguinte diretório: 

C:\xampp\htdocs

<h4> Linux </h4>

Caso não tenha sido feita nenhuma alteração na instalação na distribuição Linux, a pasta "htdocs" se encontra no seguinte diretório: 

/opt/lampp/htdocs


### EXECUÇÃO DO XAMPP
***

Após a execução do XAMPP, é preciso habilitar todos os servidores clicando em "Start All", como na imagem a seguir:

<img width="600px" src="https://github.com/pdwelpadawansteam/PDWEL-TrabFinal-PadawansTeam/blob/main/mvc-site/img/xampp-funcionando.png" />


### TESTE DA APLICAÇÃO
***

Depois de ter realizado todos os passos anteriores, para verificar o funcionamento da plataforma, basta acessar a seguinte url:

http://localhost/mvc-site/
