<?php 
//USUARIO
class Usuario implements JsonSerializable{
    
    function __construct(private string $name, private ?string $email="", private ?string $password="", private ?int $id=null){}
    function __toString() {
        return json_encode($this->jsonSerialize());
    }
    function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'name' => $this->name,
			'email'=> $this->email,
            'password'=> $this->password
        ];
    }

    // id
    public function getId(): int{
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
        return $this;
    }

    // name
    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }

    //email
    public function getEmail(): string{
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    //password
    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;
        return $this;
    }
}


// TOPIC
class Topic implements JsonSerializable{
	function __construct(private int $id, private string $description){
    }

    function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'description' => $this->description
        ];
    }

    // id
    public function getId(): int{
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
        return $this;
    }

    // description
    public function getDescription(): string{
        return $this->description;
    }
    public function setDescription(string $description){
        $this->description = $description;
        return $this;
    }
}


// POST
class Post implements JsonSerializable{
	function __construct(private string $contents, private Topic $topic, private Usuario $usuario, private ?int $id=null){
    }

    function jsonSerialize(): mixed{
        return [
            'id' => $this->id,
            'contents' => $this->contents,
            'Topic'=> $this->topic,
            'Usuario'=> $this->usuario
        ];
    }

    // id
    public function getId(): int{
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
        return $this;
    }

    // contents
    public function getContents(): string{
        return $this->contents;
    }
    public function setContents(string $contents){
        $this->contents = $contents;
        return $this;
    }

    // topic
    public function getTopic(): Topic{
        return $this->topic;
    }
    public function setTopic(Topic $topic){
        $this->topic = $topic;
        return $this;
    }

    // usuario
    public function getUsuario(): Usuario{
        return $this->usuario;
    }
    public function setUsuario(Usuario $usuario){
        $this->usuario = $usuario;
        return $this;
    }
}
