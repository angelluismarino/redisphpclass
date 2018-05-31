<?php
/**
 * @autor <angelluismarino@gmail.com>
 *
 */
 
class RedDis
{
    public $redis;

    function __construct()
    {
        $this->redis = new Redis();
    }

    function conecta( $ServeRedis='localhost', $Puerto=6379)
    {
        # Abriendo conexion redis
        $this->redis->connect($ServeRedis,$Puerto);
        return $this->redis;
    }

    function put($key,$time=3600,$value)
    {
        # Escribiendo datos
        try{
            # Estableciendo el valor en redis
            $this->redis->setex( $key, $time, $value );
        } catch( Exception $e ){
            echo $e->getMessage();
        }
    }

    function getkey($key){
        # Recuperando el valor de redis
        try{
            return $this->redis->get($key);
        } catch( Exception $e ){
            echo $e->getMessage();
        }
    }

    function getkeys(){
        # Recuperando todos los valores de redis
        try{
            return $this->redis->keys('*');
        } catch( Exception $e ){
            echo $e->getMessage();
        }
    }

    function delkey( $key ){
        # Borrando valor de redis
        try{
            $this->redis->del($key);
        } catch( Exception $e ){
            echo $e->getMessage();
        }
    }

    function delallkeys(){
        # Borrando todos los valores de redis
        try{
            $keys = $this->redis->keys("*");

            if (is_array($keys)){
                $this->redis->del($keys);
            }

        } catch( Exception $e ){
            echo $e->getMessage();
        }
    }
}