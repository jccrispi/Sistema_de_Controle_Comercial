# Sistema_de_Controle_Comercial
É um programa protótipo (para fins de aprendizagem) escrito em PHP, utilizando um servidor Apache e MySQL. Ele mantém sob controle todas as vendas, compras, fornecedores, funcionários e informações de clientes.

====================================================================================

Eu fiz este tutorial em vídeo para uma melhor explicação sobre como instalar e também sobre como o programa funciona. Caso não sejam mostradas as legendas, por favor, clique em CC (Legendas/Closed Caption) no YouTube - https://youtu.be/wmxzuzl-9jk

Este é um projeto que eu fiz para a minha faculdade no Brasil como um trabalho a ser avaliado. Então eu decidi colocá-lo aqui. Dessa forma, as pessoas podem usá-lo, e talvez melhorá-lo. Foi feito em PHP após eu ter aprendido essa linguagem por um semestre na faculdade. Apesar de o meu foco estar em infraestrutura de rede, eu aprendi alguns conceitos de programação, o que é ótimo. Eu realmente amo isso! Eu fiz isso em Linux e Windows e há várias maneiras de fazê-lo funcionar. Ele pode ser instalado separadamente: MySQL, Apache e PHP, ou a fim de torná-lo mais fácil, basta baixar e instalar o XAMPP: https://www.apachefriends.org. Isso é no caso de você estar usando o Windows, para Linux o mais fácil é WAMPServer http://www.wampserver.com/en/.

A autenticação não é totalmente funcional, é apenas para dar uma idéia sobre como poderia ser um controle de segurança real. Eu criei um usuário para testes e qualquer funcionário que você cria torna-se um novo usuário e o ID (ou CPF no Brasil) é a senha. Usuário: "user" Password: "12345"

Assim, para o XAMPP, depois de realizar a instalação, por favor faça o seguinte:

Iniciar no painel de controle do XAMPP: Apache e MySQL. Na frente do MySQL, clique no botão "Admin", a fim de adicionar o banco de dados. Vai abrir um navegador da Web. Clique no lado esquerdo em "nova", preencha o nome do campo "projeto1" e aperte o botão criar. Vá para a aba "importação" e clique em "escolher um arquivo", selecione "projeto1.sql" que você obteve no Github (é preciso encontrá-lo, ele está misturado com os arquivos PHP aqui) e clique em "executar". Às vezes ele dá alguns erros, caso isso aconteça, basta repetir o processo de importação. Vá para C:\xampp\htdocs, copie tudo dentro dele, crie uma nova pasta (por exemplo, "docs"), e cole todas as coisas que você tinha copiado. Copie todos os arquivos PHP e demais que você obteve de Github (a pasta php_files) e cole-os em C:\xampp\htdocs. Obs.: como eu disse na descrição dos arquivos, é preciso criar uma pasta chamada "img" dentro de "htdocs" e em seguida, colar todas as imagens ("desenho.PNG", "imagemmenus.jpg", e "imgindex.PNG") nesta pasta.
E está tudo pronto! Agora basta abrir um navegador e digitar "localhost" ou 127.0.0.1 Você também pode verificar o seu endereço IP (do servidor) e acessá-lo de qualquer outro computador da mesma rede, apenas abrindo o navegador da Web e digitando o endereço IP do servidor. Depois de entrar com o usuário e a senha, clique no link "home page" que surgirá no canto superior esquerdo, de modo que um menu vai aparecer. Logo eu vou postar um link para um vídeo do YouTube que eu estou fazendo para explicar detalhes sobre este programa.

Obrigado a todos!
