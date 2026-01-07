<?php

require_once 'UserRepository.php';

class UserController {
    private $repo;

    public function __construct() {
        $this->repo = new UserRepository();
    }

    public function index() {
        echo json_encode($this->repo->getAll());
    }

    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data['fullname'] || !$data['email'] || !$data['password']) {
            http_response_code(400);
            echo json_encode(["message" => "Invalid input"]);
            return;
        }

        $this->repo->create($data['fullname'], $data['email'] , $data['password']);
        http_response_code(200);
        echo json_encode(["message" => "User created"]);
    }

  public function updateUser() {
    $data = json_decode(file_get_contents("php://input"), true);

    if (
        empty($data['id']) ||
        empty($data['fullname']) ||
        empty($data['email']) ||
        empty($data['password'])
    ) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid input"]);
        return;
    }

    $this->repo->update(
        $data['id'],
        $data['fullname'],
        $data['email'],
        $data['password']
    );

    http_response_code(200);
    echo json_encode([
        "message" => "Updated successfully: " . $data['fullname']
    ]);
   }

   public function removeUser() {
    $data = json_decode(file_get_contents("php://input"), true);

    if (empty($data['id'])) {
        http_response_code(400);
        echo json_encode(["message" => "User ID is required"]);
        return;
    }

    $deleted = $this->repo->delete($data['id']);

    if ($deleted) {
        http_response_code(200);
        echo json_encode(["message" => "User deleted successfully"]);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "User not found"]);
    }
}

}
