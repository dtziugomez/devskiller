<?php
declare(strict_types=1);
interface EncodingAlgorithm
{
    /**
     * @param string $text
     * @return string
     */
    public function encode(string $text): string;
}


/**
 * Class OffsetEncodingAlgorithm
 */
class OffsetEncodingAlgorithm implements EncodingAlgorithm
{
    /**
     * Lookup string
     */
    public const CHARACTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @var int
     */
    private $offset;

    /**
     * @param int $offset
     */
    public function __construct(int $offset = 13)
    {
        
            if($offset==-1){
        throw new Exception('error');        
            }else{
        $this->offset = $offset;        
            }
        
        
    }

    /**
     * Encodes text by shifting each character (existing in the lookup string) by an offset (provided in the constructor)
     * Examples:
     *      offset = 1, input = "a", output = "b"
     *      offset = 2, input = "z", output = "B"
     *      offset = 1, input = "Z", output = "a"
     *
     * @param string $text
     * @return string
     */
    public function encode(string $text): string
    {
        /**
         * @todo: Implement it
         */
        try {
         $char_list = self::CHARACTERS;
         $_offset = strpos($char_list,$text) + $this->offset;
         $_offset = $_offset % strlen($char_list);
         return $char_list[$_offset];
        } 
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
       
    }
    
}
$o=new OffsetEncodingAlgorithm(1);
$o->encode('a');
print_r($o);
?>