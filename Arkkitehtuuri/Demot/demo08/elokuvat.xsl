<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Elokuvalistauksia (XSL)</title>
                <meta charset="UTF-8" />
            </head>
            <body>
                
                <h1>Elokuvalistauksia (XSL)</h1>
  
                <ul>
                    <li>
                        Viides elokuva tietokannassa: 
                        <xsl:value-of select="/elokuvat/elokuva[5]/elokuvan_nimi"/>
                    </li>
                    <li>
                        Ensimmäinen kauhuelokuva tietokannassa: 
                        <xsl:value-of select="/elokuvat/elokuva[kategoria = 'Kauhu']/elokuvan_nimi"/>
                    </li>
                    <li>
                        Elokuva, jonka id on 4481: 
                        <xsl:value-of select="/elokuvat/elokuva[@id = '4481']/elokuvan_nimi"/>
                    </li>
                </ul>
  
                <h2>Kaikki vuonna 2009 valmistuneet elokuvat</h2>
                
                <ol>
                <xsl:for-each select="/elokuvat/elokuva[valmistumisvuosi = '2009']">
                    
                    <li>
                        <xsl:value-of select="elokuvan_nimi"/>
                        (<xsl:value-of select="valmistumisvuosi"/>) 
                    </li>
                    
                </xsl:for-each>    
                </ol>

  
                <h2>Kaikki A-kirjaimella alkavat elokuvat, aakkosjärjestyksessä</h2>
                
                <ol>
                <xsl:for-each select="/elokuvat/elokuva[substring(elokuvan_nimi, 1, 1) = 'A']">
                    <xsl:sort select="elokuvan_nimi"/>
                    <li>
                        <xsl:value-of select="elokuvan_nimi"/>
                        (<xsl:value-of select="valmistumisvuosi"/>) 
                    </li>
                    
                </xsl:for-each>    
                </ol>      

                <h2>Kaikki Bruce Willisin elokuvat aikajärjestyksessä, komediat lihavoituna</h2>
                
                <ol>
                <xsl:for-each select="/elokuvat/elokuva[nayttelijat/nayttelija= 'Bruce Willis']">
                    <xsl:sort select="valmistumisvuosi"/>
                    
                    <xsl:choose>
                    
                    <xsl:when test="kategoria = 'Komedia'">
                    
                    <li>
                        <strong>
                        <xsl:value-of select="elokuvan_nimi"/>
                        (<xsl:value-of select="valmistumisvuosi"/>)
                        </strong> 
                    </li>
                    
                    </xsl:when>
                    
                    <xsl:otherwise>
                        
                    <li>
                        <xsl:value-of select="elokuvan_nimi"/>
                        (<xsl:value-of select="valmistumisvuosi"/>) 
                    </li>
                        
                    </xsl:otherwise>
                    
                    </xsl:choose>
                    
                </xsl:for-each>    
                </ol>   
      
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
