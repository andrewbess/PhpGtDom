<?php
namespace Gt\Dom\Test;

use Gt\Dom\Facade\DOMTokenListFactory;
use PHPUnit\Framework\TestCase;

class DOMTokenListTest extends TestCase {
	public function testLength():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		self::assertEquals(
			count($data),
			$sut->length
		);
	}

	public function testCount():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		self::assertCount(
			count($data),
			$sut
		);
	}

	public function testValueAccessor():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		self::assertEquals(
			implode(" ", $data),
			$sut->value
		);
	}

	public function testValueMutator():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		$sut->value = "four five six";
		self::assertEquals(
			"four five six",
			$sut->value
		);
	}

	public function testItem():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		for($i = 0; $i < count($data); $i++) {
			self::assertEquals(
				$data[$i],
				$sut->item($i)
			);
		}
	}

	public function testContains():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		self::assertTrue($sut->contains("one"));
		self::assertTrue($sut->contains("two"));
		self::assertTrue($sut->contains("three"));
		self::assertFalse($sut->contains("four"));
	}

	public function testAdd():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		$sut->add("four");
		self::assertTrue($sut->contains("one"));
		self::assertTrue($sut->contains("two"));
		self::assertTrue($sut->contains("three"));
		self::assertTrue($sut->contains("four"));
	}

	public function testAddMultiple():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		$sut->add("four", "five", "six");
		self::assertTrue($sut->contains("one"));
		self::assertTrue($sut->contains("two"));
		self::assertTrue($sut->contains("three"));
		self::assertTrue($sut->contains("four"));
		self::assertTrue($sut->contains("five"));
		self::assertTrue($sut->contains("six"));
	}

	public function testRemove():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		$sut->remove("two");
		self::assertTrue($sut->contains("one"));
		self::assertFalse($sut->contains("two"));
		self::assertTrue($sut->contains("three"));
	}

	public function testRemoveMultiple():void {
		$data = ["one", "two", "three"];
		$sut = DOMTokenListFactory::create(fn() => $data, fn() => null);
		$sut->remove("two", "three");
		self::assertTrue($sut->contains("one"));
		self::assertFalse($sut->contains("two"));
		self::assertFalse($sut->contains("three"));
	}
}
