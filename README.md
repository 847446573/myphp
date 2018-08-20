# myphp
该项目主要是展示一些自己在工作中应用到的代码处理方法，包括设计模式，代码规范,架构设计

## 1 设计模式(策略模式)  代码在:Src\Service\Ssp下
```
   广告行业会对接ssp,ssp会有多家，我工作中对接的有蜻蜓，风行等，如果在代码里不停的堆第三方的ssp，程序越堆越多，不便于维护，因为后期会对接无数ssp，而且
  不同的ssp 参数，返回，和流程细节上都不一样，代码里应用策略的模式，实现，在应用的地方，只需要调用即可，代码易维护，便于管理
```
## 2 模仿java spring ,php mvc中加了一层，service ,service作各model的调用处理，c只负责if else 逻辑，通过php 魔术方法_set,_get实现参数传递
## 3 mysql分表 策略
### 场景一：订单表，用户表，商品表 分表策略
  <p> 1订单表[orderId,userId,productId,price] order_01, order_02,order_03......</p>
  <p> 2 用户_订单映射表[userId,orderId](分表产品产生业务表) user_order_01,user_order_02,user_order_03...... </p>
  <p> 3 商品_订单映射表[productId,orderId](分表产生业务表) product_id_01,product_id_02,product_id_03......</p>
<pre>产品需求
   用户订单列表查询(根据用户id取模等方式, 取出用户对应的用户_订单表所在的表)
  商品订单列表查询(根据商品id取模等方式,取出商品对应的商品_订单表所在的表)
   获取所有订单列表(union多表)  
</pre>
 #### id分表规则
   <pre>
          "table_".id%n; //n 表数量</p>
           $str = crc32($id)
           if ($str < 0) {
             return "table_".substr(abs($str),0,1)
           }
           return "table_".substr($str,0,2) 
   </pre>
