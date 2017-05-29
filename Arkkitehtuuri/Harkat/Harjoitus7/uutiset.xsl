<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Uutiset</title>
                <meta charset="UTF-8" />
            </head>
            <body>
                
                <xsl:for-each select="/uutiset/uutinen">
                        <xsl:sort select="aika2" order="descending" data-type="number"/>
                        
                        <xsl:if test="position()&lt;= 20">
                            <li>
                                <xsl:element name ="a">
                                    <xsl:attribute name="href">
                                        <xsl:value-of select="linkki"/>
                                    </xsl:attribute>
                                        <xsl:value-of select="otsikko"/>
                                </xsl:element>
                                &#160;
                                <xsl:value-of select="lahde"/>
                                &#160;
                                <xsl:value-of select="aika"/>
                            </li>
                        </xsl:if>
                </xsl:for-each>

                        <xsl:element name="a">
                            <xsl:attribute name="href">RSS.php?tyylit=lista</xsl:attribute>
                            Vaihda tyyli
                        </xsl:element>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
