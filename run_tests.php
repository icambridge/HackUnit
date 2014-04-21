<?hh //partial
require_once 'src/HackUnit/Loader.php';

use HackUnit\Loader;
use HackUnit\Core\TestSuite;
use HackUnit\Core\TestCaseTest;
use HackUnit\Core\TestResult;
use HackUnit\Core\ExpectationTest;

function main(): void {
    $suite = new TestSuite();

    //TestCaseTest
    $suite->add(new TestCaseTest('testTemplateMethod'));
    $suite->add(new TestCaseTest('testResult'));
    $suite->add(new TestCaseTest('testFailedResult'));
    $suite->add(new TestCaseTest('testFailedResultFormatting'));
    $suite->add(new TestCaseTest('testSuite'));

    //ExpectationTest
    $suite->add(new ExpectationTest('test_getContext_returns_value_being_tested'));
    $suite->add(new ExpectationTest('test_toEqual_does_not_throw_exception_when_true'));
    $suite->add(new ExpectationTest('test_toEqual_throws_ExpectationException_if_fails'));

    $result = $suite->run(new TestResult());
    print "\n" . $result->getSummary() . "\n";
}

Loader::add(__DIR__ . '/test');
Loader::register();
main();