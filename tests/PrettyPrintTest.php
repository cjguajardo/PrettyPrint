<?php

use PHPUnit\Framework\TestCase;
use CGCApps\PrettyPrint;

class PrettyPrintTest extends TestCase
{
  /** @test 
   * @covers CGCApps\PrettyPrint::getLine
   */
  public function get_line_returns_span()
  {
    $pp = new PrettyPrint();

    $this->assertEquals(
      "<span class='type'>string</span>: <span class='value string'>Hello World</span>",
      $pp->getLine('string', 'Hello World')
    );

    $this->assertEquals(
      "<span class='type'>integer</span>: <span class='value integer'>1</span>",
      $pp->getLine('integer', '1')
    );
  }

  /** @test 
   * @covers CGCApps\PrettyPrint::getValue
   */
  public function get_value_returns_quoted_string()
  {
    $pp = new PrettyPrint();

    $this->assertEquals("&quot;Hello World&quot;", $pp->getValue('Hello World'));
    $this->assertEquals("&quot;1&quot;", $pp->getValue('1'));
    $this->assertEquals("&quot;{12345}&quot;", $pp->getValue('{12345}'));
  }

  /** @test 
   * @covers CGCApps\PrettyPrint::getValue
   */
  public function get_value_returns_unquoted_value_with_numeric_values()
  {
    $pp = new PrettyPrint();

    $this->assertEquals(1, $pp->getValue(1));
    $this->assertEquals(1.5, $pp->getValue(1.5));
  }

  /** @test
   * @covers CGCApps\PrettyPrint::getValue
   */
  public function get_value_returns_unquoted_value_with_boolean_values()
  {
    $pp = new PrettyPrint();

    $this->assertEquals('true', $pp->getValue(true));
    $this->assertEquals('false', $pp->getValue(false));
  }

  /** @test
   * @covers CGCApps\PrettyPrint::getValue
   */
  public function get_value_returns_object_or_array_when_value_is_object_or_array()
  {
    $pp = new PrettyPrint();

    $this->assertEquals(
      (object) ['name' => 'John Doe'],
      $pp->getValue((object) ['name' => 'John Doe'])
    );
    $this->assertEquals(
      ['name' => 'John Doe'],
      $pp->getValue(['name' => 'John Doe'])
    );
    $element = $this->getMockBuilder(stdClass::class)->getMock();
    $this->assertEquals($element, $pp->getValue($element));
  }

  /** @test
   * @covers CGCApps\PrettyPrint::processLine
   */
  public function process_line_appends_string_to_data()
  {
    $pp = new PrettyPrint();

    $data = $pp->processLine("<li>Test</li>");
    $this->assertEquals("<div class='child'><span class='type'>string</span>: <span class='value string'>&quot;&lt;li&gt;Test&lt;/li&gt;&quot;</span></div>", $data);

    $data = $pp->processLine(1);
    $this->assertEquals("<div class='child'><span class='type'>integer</span>: <span class='value integer'>1</span></div>", $data);

    // $data = $pp->processLine(new DateTime("2023-05-26 23:46:45.275618"));
    // $expectedHtml = "<div class='parent-block start' target-block='{{ID}}'><span class='type object'>object(DateTime) (3)</span><span class='key-open'>{</span></div><div class='children-block' id='{{ID}}'><div class='child'>[date] <span class='type'>string</span>: <span class='value string'>&quot;2023-05-26 23:46:45.275618&quot;</span></div><div class='child'>[timezone_type] <span class='type'>integer</span>: <span class='value integer'>3</span></div><div class='child'>[timezone] <span class='type'>string</span>: <span class='value string'>&quot;UTC&quot;</span></div></div><div class='parent-block end'>}</div>";
    // $expectedHtml = str_replace('{{ID}}', '[a-f0-9]{32}', $expectedHtml);

    // $this->assertMatchesRegularExpression("/^$expectedHtml/i", $data);
  }
}
