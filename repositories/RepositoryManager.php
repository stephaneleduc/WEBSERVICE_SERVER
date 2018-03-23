<?php


class RepositoryManager {

    //Singleton
    private static $instance = null;

    static function getInstance() {

        if (!self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private $evenementRepository;
    private $categoryRepository;
    private $userRepository;
    private $gestionRepository;

    private function __construct() {

        $pdo = (new BDD())->getPdo();
        $this->evenementRepository = new EvenementRepository ( $pdo );
        $this->categoryRepository = new CategoryRepository ( $pdo );
        $this->userRepository = new UserRepository ( $pdo );
    }

    public function getEvenementRepository() {
        return $this->evenementRepository;
    }

    public function setEvenementRepository($evenementRepository) {
        $this->evenementRepository = $evenementRepository;
    }

    public function getCategoryRepository() {
        return $this->categoryRepository;
    }

    public function setCategoryRepository($categoryRepository) {
        $this->categoryRepository = $categoryRepository;

    }

    public function getUserRepository() {
        return $this->userRepository;
    }

    public function setUserRepository( $userRepository ) {
        $this->userRepository = $userRepository;
    }

    public function getGestionRepository()
    {
        return $this->gestionRepository;
    }

    public function setGestionRepository($gestionRepository)
    {
        $this->gestionRepository = $gestionRepository;
    }
}

?>