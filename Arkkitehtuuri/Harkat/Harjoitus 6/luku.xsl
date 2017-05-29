<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Fantsu Kunnat</title>
                <meta charset="UTF-8"/>
            </head>
            <body>
            <h1>Mikkelin tiedot</h1>
                
                <ul>
                    <li>
                        Mikkeli tietokannasta:
                        <xsl:value-of select="/kunnat/kunta[nimi = 'Mikkeli']"/>
                    </li>
                </ul>
            
            <h1>Tietokannasta koodin mukaan</h1>
                
                <ul>
                    <li>
                        <xsl:value-of select="/kunnat/kunta[id = '090']/nimi"/>
                    </li>
                    <li>
                        <xsl:value-of select="/kunnat/kunta[id = '230']/nimi"/>
                    </li>
                    <li>
                        <xsl:value-of select="/kunnat/kunta[id = '301']/nimi"/>
                    </li>
                    <li>
                        <xsl:value-of select="/kunnat/kunta[id = '405']/nimi"/>
                    </li>
                    <li>
                        <xsl:value-of select="/kunnat/kunta[id = '580']/nimi"/>
                    </li>
                </ul>
                
                <h1>Kunnat alle 2000</h1>
                
                <ul>
                    
                        <xsl:for-each select="/kunnat/kunta[yhteensa&lt;= 2000]">
                        <xsl:sort select="yhteensa" order="ascending" data-type="number"/>
                        <li>
                        
                        <xsl:value-of select="yhteensa"/>
                        &#160;
                        <xsl:value-of select="nimi"/>
                        
                        </li>
                </xsl:for-each>
                    
                </ul>
                
                <h1>Miehia enemmän</h1>
                
                <ul>
                    
                        <xsl:for-each select="/kunnat/kunta[naisia&lt;miehia]">
                        <xsl:sort select="id" order="descending" data-type="number"/>
                        <li>
                        
                        <xsl:value-of select="id"/>
                        &#160;
                        <xsl:value-of select="nimi"/>
                        
                        </li>
                </xsl:for-each>
                    
                </ul>
                
                <h1>10 - 50 tuhatta</h1>
                
                <ul>
                    
                    <xsl:for-each select="/kunnat/kunta[yhteensa &gt;= 10000 and yhteensa &lt;= 50000]">
                        <xsl:choose>
                        <xsl:when test="nimi = ruotsi">
                         <li>
                            
                            <xsl:value-of select="nimi"/>
                            
                            
                        </li>
                        </xsl:when>
                 
                    <xsl:otherwise>
                     
                    <li>
                        <xsl:value-of select="nimi"/>
                        (<xsl:value-of select="ruotsi"/>)
                    </li>
                     
                    </xsl:otherwise> 
                  
                 </xsl:choose>
                        
                </xsl:for-each>
                    
                </ul>
                
                <h1>20 suurinta</h1>
                
                <ul>
                    
                <xsl:for-each select="/kunnat/kunta[yhteensa]">
                        <xsl:sort select="yhteensa" order="descending" data-type="number"/>
                        
                        <xsl:if test="position()&lt;= 20">
                            <li>
                                <xsl:value-of select="nimi"/>
                                &#160;
                                <xsl:value-of select="yhteensa"/>
                            </li>
                        </xsl:if>
                        
                </xsl:for-each>
                    
                </ul>
                
                <h1>Yhteenveto</h1>
                
                <ul>
                    
               
                Kuntia yhteensä: <xsl:value-of select="count(kunnat/kunta)" />
            <br/>
                Asukasluku keskiarvo: <xsl:value-of select="sum(kunnat/kunta/yhteensa) div count(kunnat/kunta)"/>
            <br/>
                Naisten prosentti määrä: <xsl:value-of select=" sum(kunnat/kunta/naisia) div sum(kunnat/kunta/yhteensa) * 100"/>
                                
                    
                </ul>
                
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
