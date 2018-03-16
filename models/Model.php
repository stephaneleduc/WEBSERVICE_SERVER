<?php


    abstract class Model {

        protected $id;

        function __construct ( array $datas = [] ) {
            $this->hydrate( $datas );
        }

        private function hydrate (array $datas ) {

            foreach ($datas as $key => $value ) {

                $method = "set" . ucfirst($key);

                if ( method_exists( $this, $method ) ) {

                    $this->$method( $value );

                }
            }
        }

        public function getId() {
                return $this->id;
        }

        public function setId( $id ) {
                $this->id = $id;
        }
    }

?>