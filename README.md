![Captura de tela 2025-05-15 212832](https://github.com/user-attachments/assets/85d5d73e-cf23-40d9-95b4-38fc70dcfbeb)

🎮 API de Jogos - Laravel
Este projeto é uma API construída com Laravel (PHP) que tem como objetivo gerenciar um catálogo de jogos de videogame.

A ideia principal é permitir que qualquer sistema consiga se comunicar com a API para cadastrar, listar, consultar, editar e deletar informações sobre jogos eletrônicos.

📦 Campos disponíveis
Cada jogo registrado na API possui os seguintes campos:

Titulo: Nome do jogo

descricao: Breve resumo ou sinopse

ano: Ano de lançamento

genero: Categoria (ex: Ação, Aventura, Estratégia)

plataformas: Plataformas disponíveis (ex: PC, PS5, Xbox Series)

🔌 Endpoints disponíveis
Método	Rota	Ação
GET	/api/jogos	Lista todos os jogos
POST	/api/jogos	Cria um novo jogo
GET	/api/jogos/{id}	Retorna um jogo específico
PUT	/api/jogos/{id}	Atualiza um jogo existente
DELETE	/api/jogos/{id}	Remove um jogo

⚙️ Como funciona
A API utiliza o padrão JSON para enviar e receber dados. Os retornos são bem estruturados, com mensagens de sucesso e erro, além dos códigos HTTP apropriados para cada situação.

A validação dos campos é feita com o Validator do Laravel, garantindo que todos os dados obrigatórios sejam informados antes de qualquer ação no banco.

