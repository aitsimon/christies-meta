<?php

class User
{
    public int $user_id;
    public string $email;
    public string $password;
    public string $rol;
    public float $tokens;
    public string $telph;

    /**
     * @param int $user_id
     * @param string $email
     * @param string $password
     * @param string $rol
     * @param float $tokens
     * @param string $telph
     */
    public function __construct(int $user_id, string $email, string $password, string $rol, float $tokens, string $telph)
    {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
        $this->tokens = $tokens;
        $this->telph = $telph;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRol(): string
    {
        return $this->rol;
    }

    /**
     * @param string $rol
     */
    public function setRol(string $rol): void
    {
        $this->rol = $rol;
    }

    /**
     * @return float
     */
    public function getTokens(): float
    {
        return $this->tokens;
    }

    /**
     * @param float $tokens
     */
    public function setTokens(float $tokens): void
    {
        $this->tokens = $tokens;
    }

    /**
     * @return string
     */
    public function getTelph(): string
    {
        return $this->telph;
    }

    /**
     * @param string $telph
     */
    public function setTelph(string $telph): void
    {
        $this->telph = $telph;
    }


}