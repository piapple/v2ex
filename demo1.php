<?php 
       $_sql=$_connect -> query("SELECT * FROM articl ORDER BY lastdate desc LIMIT 0,15");
       while (!!$result=_fetch_array($_sql)) { ?>
        <div class="cell item" style="">
            <table width="100%">
                <tbody>
                <tr>
                    <td><a href=""><img src="face/m1.gif" class="avatar" border="0" align="default" width="50" height="50px"></a></td>
                    <td width="auto" valign="middle">
                      <span class="item_title">
                        <a href=""><?php echo $result['title'];?></a>
                      </span>
                      <div style="margin-bottom:5px"></div>
                      <span class="small fade">
                        <a class="node" href="">
                          <?php echo $result['type'];?>
                        </a> &nbsp;•&nbsp; 
                        <strong>
                          <a href=""><?php echo $result['username'];?></a>
                        </strong> 
                         &nbsp;•&nbsp; 最后回复来自 
                        <strong>
                           <a href="">
                            <?php echo $result['lastuser'];?>
                           </a>
                        </strong>
                        <?php echo tranTime($result['lastdate']);?>
                      </span>
                    </td>
                    <td width="70" align="right" valign="middle">
                        <a href="" class="count_livid"><?php echo $result['commentcount'];?></a>
                    </td>
                </tr>
              </tbody>
          </table>
        </div>
      <?php } ?> 