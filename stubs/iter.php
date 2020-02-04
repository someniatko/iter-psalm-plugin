<?php
declare(strict_types=1);

namespace iter;

/**
 * @template T of int|float
 *
 * @param T $start
 * @param T $end
 * @param T|null $step
 *
 * @return \Iterator<T>
 */
function range($start, $end, $step = null): \Iterator {}

/**
 * @template TBefore
 * @template TAfter
 *
 * @param callable(TBefore):TAfter $function
 * @param iterable<TBefore> $iterable
 *
 * @return \Iterator<TAfter>
 */
function map(callable $function, iterable $iterable): \Iterator {}

/**
 * @template TBefore
 * @template TAfter
 * @template TValue
 *
 * @param callable(TBefore):TAfter $function
 * @param iterable<TBefore, TValue> $iterable
 *
 * @return \Iterator<TAfter, TValue>
 */
function mapKeys(callable $function, iterable $iterable): \Iterator {}

/**
 * @template TVBefore
 * @template TKAfter
 * @template TVAfter
 *
 * @param callable(TVBefore):iterable<TKAfter, TVAfter> $function
 * @param iterable<TBefore> $iterable
 *
 * @return \Iterator<TKAfter, TVAfter>
 */
function flatMap(callable $function, iterable $iterable): \Iterator {}

/**
 * @template TV
 * @template TKBefore
 * @template TVAfter
 *
 * @param callable(TValue):TKAfter $function
 * @param iterable<TKBefore, TValue> $iterable
 *
 * @return \Iterator<TKAfter, TValue>
 */
function reindex(callable $function, iterable $iterable): \Iterator {}

/**
 * @template T
 *
 * @param callable(T):void $function
 * @param iterable<T> $iterable
 *
 * @return void
 */
function apply(callable $function, iterable $iterable): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param callable(TValue):bool
 * @param iterable<TKey, TValue>
 *
 * @return \Iterator<TKey, TValue>
 */
function filter(callable $predicate, iterable $iterable): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param iterable<TKey, TValue>
 *
 * @return \Iterator<array{0:TKey, 1:TValue}>
 */
function enumerate(iterable $iterable): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param iterable<TKey, TValue>
 *
 * @return \Iterator<array{0:TKey, 1:TValue}>
 */
function toPairs(iterable $iterable): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param iterable<array{0:TKey, 1:TValue}>
 *
 * @return \Iterator<TKey, TValue>
 */
function fromPairs(iterable $iterable): \Iterator {}

/**
 * @template TKey
 * @template TValue
 * @template TAcc
 *
 * @param callable(TAcc, TValue, TKey=):TAcc $function
 * @param iterable<TKey, TValue> $iterable
 * @param TAcc $startValue
 *
 * @return TAcc
 */
function reduce(callable $function, iterable $iterable, $startValue = null) {}

/**
 * @template TKey
 * @template TValue
 * @template TAcc
 *
 * @param callable(TAcc, TValue, TKey=):TAcc $function
 * @param iterable<TKey, TValue> $iterable
 * @param TAcc $startValue
 *
 * @return \Iterator<TAcc>
 */
function reductions(callable $function, iterable $iterable, $startValue = null): \Iterator {}

/**
 * FIXME: this is very simplified approach as it does not consider different types for
 * different iterables. However, it seems, this is not fixable using psalm.
 *
 * @template TKey
 * @template TValue
 *
 * @param iterable<TKey, TValue> ...$iterables
 * @return \Iterator<array<TKey, TValue>>
 */
function zip(iterable ...$iterables): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param iterable<mixed, TKey> $keys
 * @param iterable<mixed, TValue> $values
 *
 * @return \Iterator<TKey, TValue>
 */
function zipKeyValue(iterable $keys, iterable $values): \Iterator {}

/**
 * FIXME: again, this is very simplified approach as it does not consider different types for
 * different iterables. However, it seems, this is not fixable using psalm.
 *
 * @template TValue
 *
 * @param iterable<mixed, TValue> ...$iterables
 * @return \Iterator<list<TValue>>
 */
function product(iterable ...$iterables): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param iterable<TKey, TValue> $iterable
 * @param int $start
 * @param int $length
 *
 * @return \Iterator<TKey, TValue>
 */
function slice(iterable $iterable, int $start, $length = INF): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param int $num
 * @param iterable<TKey, TValue> $iterable
 *
 * @return \Iterator<TKey, TValue>
 */
function take(int $num, iterable $iterable): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param int $num
 * @param iterable<TKey, TValue> $iterable
 *
 * @return \Iterator<TKey, TValue>
 */
function drop(int $num, iterable $iterable): \Iterator {
    return slice($iterable, $num);
}

/**
 * @template T
 *
 * @param T $value
 * @param int $num
 *
 * @throws \InvalidArgumentException if num is negative
 *
 * @return \Iterator<T>
 */
function repeat($value, $num = INF): \Iterator {}

/**
 * @template T
 *
 * @param iterable<T, mixed> $iterable
 *
 * @return \Iterator<T>
 */
function keys(iterable $iterable): \Iterator {}

/**
 * @template T
 *
 * @param iterable<mixed, T> $iterable
 *
 * @return \Iterator<T>
 */
function values($iterable): \Iterator {}

/**
 * @template T
 *
 * @param callable(T):bool $predicate
 * @param iterable<T> $iterable
 *
 * @return bool
 */
function any(callable $predicate, iterable $iterable): bool {}

/**
 * @template T
 *
 * @param callable(T):bool $predicate
 * @param iterable<T> $iterable
 *
 * @return bool
 */
function all(callable $predicate, iterable $iterable): bool {}

/**
 * @template T
 *
 * @param callable(T):bool $predicate
 * @param iterable<T> $iterable
 *
 * @return null|T
 */
function search(callable $predicate, iterable $iterable) {}

/**
 * @template T
 *
 * @param callable(T):bool $predicate
 * @param iterable<T> $iterable
 *
 * @return \Iterator<T>
 */
function takeWhile(callable $predicate, iterable $iterable): \Iterator {}

/**
 * @template T
 *
 * @param callable(T):bool $predicate
 * @param iterable<T> $iterable
 *
 * @return \Iterator<T>
 */
function dropWhile(callable $predicate, iterable $iterable): \Iterator {}

/**
 * FIXME: probably not solvable without recursive types like in TypeScript.
 * Types are only describen for $levels = 1.
 *
 * @template T
 *
 * @param iterable<iterable<T>> $iterable
 * @param int $levels
 * @return iterable<T>
 */
function flatten(iterable $iterable, $levels = INF): \Iterator {}

/**
 * @template TKey
 * @template TValue
 *
 * @param iterable<TKey, TValue> $iterable
 *
 * @return \Iterator<TValue, TKey>
 */
function flip(iterable $iterable): \Iterator {}

/**
 * @template TKey of array-key
 * @template TValue
 *
 * @param iterable<TKey, TValue> $iterable
 * @param int $size
 * @param bool $preserveKeys
 *
 * @return \Iterator<list<TValue>|array<TKey, TValue>>
 */
function chunk(iterable $iterable, int $size, bool $preserveKeys = false): \Iterator {}

/**
 * @template TKey of array-key
 * @template TValue
 *
 * @param iterable<TKey, TValue> $iterable
 * @param int $size
 *
 * @return \Iterator<array<TKey, TValue>>
 */
function chunkWithKeys(iterable $iterable, int $size): \Iterator {}

/**
 * FIXME: how to specify objects implementing __toString() ?
 *
 * @param string $separator
 * @param iterable<string|object> $iterable
 *
 * @return string
 */
function join(string $separator, iterable $iterable): string {}

/**
 * @param iterable|\Countable $iterable
 * @return int
 */
function count($iterable): int {}

/**
 * @param iterable|\Countable $iterable
 * @return bool
 */
function isEmpty($iterable): bool {}

/**
 * @template TKey
 * @template TValue
 *
 * @param iterable<TKey, TValue> $iterable
 *
 * @return \Iterator<TKey, TValue>
 */
function toIter(iterable $iterable): \Iterator {}

/**
 * @template T
 *
 * @param iterable<T> $iterable
 *
 * @return list<T>
 */
function toArray(iterable $iterable): array {}

/**
 * @template TKey of array-key
 * @template TValue
 *
 * @param iterable<TKey, TValue> $iterable
 *
 * @return array<TKey, TValue>
 */
function toArrayWithKeys(iterable $iterable): array {}

/**
 * @param $value
 *
 * @psalm-assert-if-true iterable $value
 */
function isIterable($value): bool {}
