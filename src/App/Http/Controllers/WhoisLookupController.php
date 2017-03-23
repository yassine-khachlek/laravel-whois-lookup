<?php

namespace Yk\LaravelWhoisLookup\App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Rule;
use Response;

class WhoisLookupController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Yk\LaravelWhoisLookup::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$whois = [
			'ac' =>'whois.nic.ac',
			'ad' =>'whois.ripe.net',
			'ae' =>'whois.aeda.net.ae',
			'aero' =>'whois.aero',
			'af' =>'whois.nic.af',
			'ag' =>'whois.nic.ag',
			'ai' =>'whois.ai',
			'al' =>'whois.ripe.net',
			'am' =>'whois.amnic.net',
			'as' =>'whois.nic.as',
			'asia' =>'whois.nic.asia',
			'at' =>'whois.nic.at',
			'au' =>'whois.aunic.net',
			'aw' =>'whois.nic.aw',
			'ax' =>'whois.ax',
			'az' =>'whois.ripe.net',
			'ba' =>'whois.ripe.net',
			'bar' =>'whois.nic.bar',
			'be' =>'whois.dns.be',
			'berlin' =>'whois.nic.berlin',
			'best' =>'whois.nic.best',
			'bg' =>'whois.register.bg',
			'bi' =>'whois.nic.bi',
			'biz' =>'whois.neulevel.biz',
			'bj' =>'www.nic.bj',
			'bo' =>'whois.nic.bo',
			'br' =>'whois.nic.br',
			'br.com' =>'whois.centralnic.com',
			'bt' =>'whois.netnames.net',
			'bw' =>'whois.nic.net.bw',
			'by' =>'whois.cctld.by',
			'bz' =>'whois.belizenic.bz',
			'bzh' =>'whois-bzh.nic.fr',
			'ca' =>'whois.cira.ca',
			'cat' =>'whois.cat',
			'cc' =>'whois.nic.cc',
			'cd' =>'whois.nic.cd',
			'ceo' =>'whois.nic.ceo',
			'cf' =>'whois.dot.cf',
			'ch' =>'whois.nic.ch',
			'ci' =>'whois.nic.ci',
			'ck' =>'whois.nic.ck',
			'cl' =>'whois.nic.cl',
			'cloud' =>'whois.nic.cloud',
			'club' =>'whois.nic.club',
			'cn' =>'whois.cnnic.net.cn',
			'cn.com' =>'whois.centralnic.com',
			'co' =>'whois.nic.co',
			'co.nl' =>'whois.co.nl',
			'com' =>'whois.verisign-grs.com',
			'coop' =>'whois.nic.coop',
			'cx' =>'whois.nic.cx',
			'cy' =>'whois.ripe.net',
			'cz' =>'whois.nic.cz',
			'de' =>'whois.denic.de',
			'dk' =>'whois.dk-hostmaster.dk',
			'dm' =>'whois.nic.cx',
			'dz' =>'whois.nic.dz',
			'ec' =>'whois.nic.ec',
			'edu' =>'whois.educause.net',
			'ee' =>'whois.tld.ee',
			'eg' =>'whois.ripe.net',
			'es' =>'whois.nic.es',
			'eu' =>'whois.eu',
			'eu.com' =>'whois.centralnic.com',
			'eus' =>'whois.nic.eus',
			'fi' =>'whois.fi',
			'fo' =>'whois.nic.fo',
			'fr' =>'whois.nic.fr',
			'gb' =>'whois.ripe.net',
			'gb.com' =>'whois.centralnic.com',
			'gb.net' =>'whois.centralnic.com',
			'qc.com' =>'whois.centralnic.com',
			'ge' =>'whois.ripe.net',
			'gg' =>'whois.gg',
			'gi' =>'whois2.afilias-grs.net',
			'gl' =>'whois.nic.gl',
			'gm' =>'whois.ripe.net',
			'gov' =>'whois.nic.gov',
			'gr' =>'whois.ripe.net',
			'gs' =>'whois.nic.gs',
			'gy' =>'whois.registry.gy',
			'hamburg' =>'whois.nic.hamburg',
			'hiphop' =>'whois.uniregistry.net',
			'hk' =>'whois.hknic.net.hk',
			'hm' =>'whois.registry.hm',
			'hn' =>'whois2.afilias-grs.net',
			'host' =>'whois.nic.host',
			'hr' =>'whois.dns.hr',
			'ht' =>'whois.nic.ht',
			'hu' =>'whois.nic.hu',
			'hu.com' =>'whois.centralnic.com',
			'id' =>'whois.pandi.or.id',
			'ie' =>'whois.domainregistry.ie',
			'il' =>'whois.isoc.org.il',
			'im' =>'whois.nic.im',
			'in' =>'whois.inregistry.net',
			'info' =>'whois.afilias.info',
			'ing' =>'domain-registry-whois.l.google.com',
			'ink' =>'whois.centralnic.com',
			'int' =>'whois.isi.edu',
			'io' =>'whois.nic.io',
			'iq' =>'whois.cmc.iq',
			'ir' =>'whois.nic.ir',
			'is' =>'whois.isnic.is',
			'it' =>'whois.nic.it',
			'je' =>'whois.je',
			'jobs' =>'jobswhois.verisign-grs.com',
			'jp' =>'whois.jprs.jp',
			'ke' =>'whois.kenic.or.ke',
			'kg' =>'whois.domain.kg',
			'ki' =>'whois.nic.ki',
			'kr' =>'whois.kr',
			'kz' =>'whois.nic.kz',
			'la' =>'whois2.afilias-grs.net',
			'li' =>'whois.nic.li',
			'london' =>'whois.nic.london',
			'lt' =>'whois.domreg.lt',
			'lu' =>'whois.restena.lu',
			'lv' =>'whois.nic.lv',
			'ly' =>'whois.lydomains.com',
			'ma' =>'whois.iam.net.ma',
			'mc' =>'whois.ripe.net',
			'md' =>'whois.nic.md',
			'me' =>'whois.nic.me',
			'mg' =>'whois.nic.mg',
			'mil' =>'whois.nic.mil',
			'mk' =>'whois.ripe.net',
			'ml' =>'whois.dot.ml',
			'mo' =>'whois.monic.mo',
			'mobi' =>'whois.dotmobiregistry.net',
			'ms' =>'whois.nic.ms',
			'mt' =>'whois.ripe.net',
			'mu' =>'whois.nic.mu',
			'museum' =>'whois.museum',
			'mx' =>'whois.nic.mx',
			'my' =>'whois.mynic.net.my',
			'mz' =>'whois.nic.mz',
			'na' =>'whois.na-nic.com.na',
			'name' =>'whois.nic.name',
			'nc' =>'whois.nc',
			'net' =>'whois.verisign-grs.com',
			'nf' =>'whois.nic.cx',
			'ng' =>'whois.nic.net.ng',
			'nl' =>'whois.domain-registry.nl',
			'no' =>'whois.norid.no',
			'no.com' =>'whois.centralnic.com',
			'nu' =>'whois.nic.nu',
			'nz' =>'whois.srs.net.nz',
			'om' =>'whois.registry.om',
			'ong' =>'whois.publicinterestregistry.net',
			'ooo' =>'whois.nic.ooo',
			'org' =>'whois.pir.org',
			'paris' =>'whois-paris.nic.fr',
			'pe' =>'kero.yachay.pe',
			'pf' =>'whois.registry.pf',
			'pics' =>'whois.uniregistry.net',
			'pl' =>'whois.dns.pl',
			'pm' =>'whois.nic.pm',
			'pr' =>'whois.nic.pr',
			'press' =>'whois.nic.press',
			'pro' =>'whois.registrypro.pro',
			'pt' =>'whois.dns.pt',
			'pub' =>'whois.unitedtld.com',
			'pw' =>'whois.nic.pw',
			'qa' =>'whois.registry.qa',
			're' =>'whois.nic.re',
			'ro' =>'whois.rotld.ro',
			'rs' =>'whois.rnids.rs',
			'ru' =>'whois.tcinet.ru',
			'sa' =>'saudinic.net.sa',
			'sa.com' =>'whois.centralnic.com',
			'sb' =>'whois.nic.net.sb',
			'sc' =>'whois2.afilias-grs.net',
			'se' =>'whois.nic-se.se',
			'se.com' =>'whois.centralnic.com',
			'se.net' =>'whois.centralnic.com',
			'sg' =>'whois.nic.net.sg',
			'sh' =>'whois.nic.sh',
			'si' =>'whois.arnes.si',
			'sk' =>'whois.sk-nic.sk',
			'sm' =>'whois.nic.sm',
			'st' =>'whois.nic.st',
			'so' =>'whois.nic.so',
			'su' =>'whois.tcinet.ru',
			'sx' =>'whois.sx',
			'sy' =>'whois.tld.sy',
			'tc' =>'whois.adamsnames.tc',
			'tel' =>'whois.nic.tel',
			'tf' =>'whois.nic.tf',
			'th' =>'whois.thnic.net',
			'tj' =>'whois.nic.tj',
			'tk' =>'whois.nic.tk',
			'tl' =>'whois.domains.tl',
			'tm' =>'whois.nic.tm',
			'tn' =>'whois.ati.tn',
			'to' =>'whois.tonic.to',
			'top' =>'whois.nic.top',
			'tp' =>'whois.domains.tl',
			'tr' =>'whois.nic.tr',
			'travel' =>'whois.nic.travel',
			'tw' =>'whois.twnic.net.tw',
			'tv' =>'whois.nic.tv',
			'tz' =>'whois.tznic.or.tz',
			'ua' =>'whois.ua',
			'ug' =>'whois.co.ug',
			'uk' =>'whois.nic.uk',
			'uk.com' =>'whois.centralnic.com',
			'uk.net' =>'whois.centralnic.com',
			'ac.uk' =>'whois.ja.net',
			'gov.uk' =>'whois.ja.net',
			'us' =>'whois.nic.us',
			'us.com' =>'whois.centralnic.com',
			'uy' =>'nic.uy',
			'uy.com' =>'whois.centralnic.com',
			'uz' =>'whois.cctld.uz',
			'va' =>'whois.ripe.net',
			'vc' =>'whois2.afilias-grs.net',
			've' =>'whois.nic.ve',
			'vg' =>'ccwhois.ksregistry.net',
			'vu' =>'vunic.vu',
			'wang' =>'whois.nic.wang',
			'wf' =>'whois.nic.wf',
			'wiki' =>'whois.nic.wiki',
			'ws' =>'whois.website.ws',
			'xxx' =>'whois.nic.xxx',
			'xyz' =>'whois.nic.xyz',
			'yu' =>'whois.ripe.net',
			'za.com' =>'whois.centralnic.com',
		];

        Validator::extend('domain', function ($attribute, $value, $parameters, $validator) {
		    preg_match("/[^\.\/]+\.[^\.\/]+$/", $value, $matches);
		    return count($matches);
        });

        Validator::extend('extension', function ($attribute, $value, $parameters, $validator) use ($whois) {
        	$pathinfo = pathinfo($value);
        	$extension = isset($pathinfo['extension']) ? $pathinfo['extension'] : false;
        	return in_array($extension, array_keys($whois));
        });

        $validator = Validator::make($request->all(), [
            'domain' => 'required|min:4|domain|extension',
        ]);

        if ($validator->fails()) {
        	if($request->ajax())
			{
				return Response::json($validator->messages(), 400);
            }else{
            	return redirect('whois-lookup')
                        ->withErrors($validator)
                        ->withInput();
            }
        }

        $domain = $request->get('domain');
        $pathinfo = pathinfo($domain);
        $extension = $pathinfo['extension'];

		$fp = fsockopen($whois[$extension], 43);
		 
		$out = $domain."\r\n";
		 
		fwrite($fp, $out);
		 
		$response = '';
		while (!feof($fp)) {
		    $response .= fgets($fp, 4096);
		}
		 
		fclose($fp);

		if ($request->ajax()) {
			return ['response' => $response];
		}else{
			return $response;
		}		
    }
}
