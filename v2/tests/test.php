<?

class AbstractClass
{
    public function __ToString ( ) { }
}

class DescendantClass extends AbstractClass
{

}

interface MyI
{
    public function hello ( AbstractClass $obj );
}

class MyClassOne implements MyI
{
    public function hello ( AbstractClass $obj ) 
    {
        echo $obj;
    }
} // Will work as Interface Satisfied

class MyClassTwo implements MyI
{
    public function hello ( DescendantClass $obj ) 
    {
        echo $obj;
    }
} // Will work because Interface doesn't support descendants

?>