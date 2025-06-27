<?php
class Musica
{

        private $id;
        private $titulo;
        private $artista;
        private $genero;
        private $data_lancamento;
        private $duracao;
        private $url;
        private $tipo_lancamento;


        /**
         * Get the value of tipo_lancamento
         */
        public function getTipoLancamento()
        {
                return $this->tipo_lancamento;
        }

        /**
         * Set the value of tipo_lancamento
         */
        public function setTipoLancamento($tipo_lancamento): self
        {
                $this->tipo_lancamento = $tipo_lancamento;
                return $this;
        }

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
        public function getCard()
        {
                echo "<div class='card h-100 bg-secondary text-white'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($this->getTitulo()) . "</h5>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>" . htmlspecialchars($this->getArtista()) . "</h6>";
                echo "<p class='card-text'>";
                echo "<strong>Tipo de Lançamento:</strong> " . $this->obterTipoLancamento($this->getTipoLancamento()) . "<br>";
                echo "<strong>Gênero:</strong> " . $this->obterGenero($this->getGenero()) . "<br>";
                echo "<strong>Data de Lançamento:</strong> " . htmlspecialchars($this->getDataLancamento()) . "<br>";
                echo "<strong>Duração:</strong> " . htmlspecialchars($this->getDuracao()) . " segundos<br>";
                echo "</p>";
                echo "<a href='" . htmlspecialchars($this->getUrl()) . "' class='btn btn-primary' target='_blank'><i class='bi bi-play-fill'></i> Ouvir</a>";
                echo "</div>";
                echo "</div>";
        }



        public function obterGenero($valor)
        {
                $generos = [
                        'rock' => 'Rock',
                        'rap' => 'Rap',
                        'pop' => 'Pop',
                        'sertanejo' => 'Sertanejo',
                        'funk' => 'Funk',
                        'pagode' => 'Pagode'
                ];

                return $generos[$valor] ?? 'Gênero não encontrado';
        }
        public function obterTipoLancamento($valor)
        {
                $tipos = [
                        'single' => 'Single',
                        'album' => 'Álbum',
                        'ep' => 'EP',
                        'soundtrack' => 'Trilha Sonora',
                        'live' => 'Ao Vivo'
                ];

                return $tipos[$valor] ?? 'Tipo de lançamento não encontrado';
        }
}
