CREATE TABLE Musica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,  
    artista VARCHAR(100) NOT NULL,  
    tipo_lancamento VARCHAR(100),  
    genero VARCHAR(50),  
    data_lancamento DATE,
    duracao INT, 
    url VARCHAR(255)  
);
