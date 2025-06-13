<?php 
    class Musica {

        private $id;
        private $titulo;
        private $artista;
        private $album;
        private $genero;
        private $data_lancamento;
        private $duracao;
        private $url;


        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of titulo
         */
        public function getTitulo()
        {
                return $this->titulo;
        }

        /**
         * Set the value of titulo
         */
        public function setTitulo($titulo): self
        {
                $this->titulo = $titulo;

                return $this;
        }

        /**
         * Get the value of artista
         */
        public function getArtista()
        {
                return $this->artista;
        }

        /**
         * Set the value of artista
         */
        public function setArtista($artista): self
        {
                $this->artista = $artista;

                return $this;
        }

        /**
         * Get the value of album
         */
        public function getAlbum()
        {
                return $this->album;
        }

        /**
         * Set the value of album
         */
        public function setAlbum($album): self
        {
                $this->album = $album;

                return $this;
        }

        /**
         * Get the value of genero
         */
        public function getGenero()
        {
                return $this->genero;
        }

        /**
         * Set the value of genero
         */
        public function setGenero($genero): self
        {
                $this->genero = $genero;

                return $this;
        }

        /**
         * Get the value of data_lancamento
         */
        public function getDataLancamento()
        {
                return $this->data_lancamento;
        }

        /**
         * Set the value of data_lancamento
         */
        public function setDataLancamento($data_lancamento): self
        {
                $this->data_lancamento = $data_lancamento;

                return $this;
        }

        /**
         * Get the value of duracao
         */
        public function getDuracao()
        {
                return $this->duracao;
        }

        /**
         * Set the value of duracao
         */
        public function setDuracao($duracao): self
        {
                $this->duracao = $duracao;

                return $this;
        }

        /**
         * Get the value of url
         */
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         */
        public function setUrl($url): self
        {
                $this->url = $url;

                return $this;
        }
                public function getCard(){
                echo "<div style='border: solid 1px; width: 300px; margin-top: 20px;'>";
                echo $this->titulo . "<br>";
                echo $this->artista . "<br>";
                echo $this->album . "<br>";
                echo $this->genero . "<br>";
                echo $this->data_lancamento . "<br>";
                echo $this->duracao . "<br>";
                echo $this->url . "<br>";
                echo "</div>";
            }            
    
}