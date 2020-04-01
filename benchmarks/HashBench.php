<?php

/**
 * @Revs(10000)
 * @Iterations(5)
 * @BeforeMethods({"init"})
 */
class HashBench
{
    private $data;

    public function init()
    {
        $this->data = str_repeat('x', 50);
    }

    public function bench_md2()
    {
        hash('md2', $this->data);
    }

    public function bench_md4()
    {
        hash('md4', $this->data);
    }

    public function bench_md5()
    {
        hash('md5', $this->data);
    }

    public function bench_sha1()
    {
        hash('sha1', $this->data);
    }

    public function bench_sha224()
    {
        hash('sha224', $this->data);
    }

    public function bench_sha256()
    {
        hash('sha256', $this->data);
    }

    public function bench_sha384()
    {
        hash('sha384', $this->data);
    }

    public function bench_sha512_224()
    {
        hash('sha512/224', $this->data);
    }

    public function bench_sha512_256()
    {
        hash('sha512/256', $this->data);
    }

    public function bench_sha512()
    {
        hash('sha512', $this->data);
    }

    public function bench_sha3_224()
    {
        hash('sha3-224', $this->data);
    }

    public function bench_sha3_256()
    {
        hash('sha3-256', $this->data);
    }

    public function bench_sha3_384()
    {
        hash('sha3-384', $this->data);
    }

    public function bench_sha3_512()
    {
        hash('sha3-512', $this->data);
    }

    public function bench_ripemd128()
    {
        hash('ripemd128', $this->data);
    }

    public function bench_ripemd160()
    {
        hash('ripemd160', $this->data);
    }

    public function bench_ripemd256()
    {
        hash('ripemd256', $this->data);
    }

    public function bench_ripemd320()
    {
        hash('ripemd320', $this->data);
    }

    public function bench_whirlpool()
    {
        hash('whirlpool', $this->data);
    }

    public function bench_tiger128_3()
    {
        hash('tiger128,3', $this->data);
    }

    public function bench_tiger160_3()
    {
        hash('tiger160,3', $this->data);
    }

    public function bench_tiger192_3()
    {
        hash('tiger192,3', $this->data);
    }

    public function bench_tiger128_4()
    {
        hash('tiger128,4', $this->data);
    }

    public function bench_tiger160_4()
    {
        hash('tiger160,4', $this->data);
    }

    public function bench_tiger192_4()
    {
        hash('tiger192,4', $this->data);
    }

    public function bench_snefru()
    {
        hash('snefru', $this->data);
    }

    public function bench_snefru256()
    {
        hash('snefru256', $this->data);
    }

    public function bench_gost()
    {
        hash('gost', $this->data);
    }

    public function bench_gost_crypto()
    {
        hash('gost-crypto', $this->data);
    }

    public function bench_adler32()
    {
        hash('adler32', $this->data);
    }

    public function bench_crc32()
    {
        hash('crc32', $this->data);
    }

    public function bench_crc32b()
    {
        hash('crc32b', $this->data);
    }

    public function bench_crc32c()
    {
        hash('crc32c', $this->data);
    }

    public function bench_fnv132()
    {
        hash('fnv132', $this->data);
    }

    public function bench_fnv1a32()
    {
        hash('fnv1a32', $this->data);
    }

    public function bench_fnv164()
    {
        hash('fnv164', $this->data);
    }

    public function bench_fnv1a64()
    {
        hash('fnv1a64', $this->data);
    }

    public function bench_joaat()
    {
        hash('joaat', $this->data);
    }

    public function bench_haval128_3()
    {
        hash('haval128,3', $this->data);
    }

    public function bench_haval160_3()
    {
        hash('haval160,3', $this->data);
    }

    public function bench_haval192_3()
    {
        hash('haval192,3', $this->data);
    }

    public function bench_haval224_3()
    {
        hash('haval224,3', $this->data);
    }

    public function bench_haval256_3()
    {
        hash('haval256,3', $this->data);
    }

    public function bench_haval128_4()
    {
        hash('haval128,4', $this->data);
    }

    public function bench_haval160_4()
    {
        hash('haval160,4', $this->data);
    }

    public function bench_haval192_4()
    {
        hash('haval192,4', $this->data);
    }

    public function bench_haval224_4()
    {
        hash('haval224,4', $this->data);
    }

    public function bench_haval256_4()
    {
        hash('haval256,4', $this->data);
    }

    public function bench_haval128_5()
    {
        hash('haval128,5', $this->data);
    }

    public function bench_haval160_5()
    {
        hash('haval160,5', $this->data);
    }

    public function bench_haval192_5()
    {
        hash('haval192,5', $this->data);
    }

    public function bench_haval224_5()
    {
        hash('haval224,5', $this->data);
    }

    public function bench_haval256_5()
    {
        hash('haval256,5', $this->data);
    }
}
