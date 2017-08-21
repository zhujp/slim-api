<?php 
namespace app\models;

class Users extends Basic
{
    public $timestamps = false;
    protected $fillable = ['name','mobile'];
}