# myphp
该项目主要是展示一些自己在工作中应用到的代码处理方法，包括设计模式，代码规范,架构设计


## 2 php mvc中加了一层，中间层ｍservice ,ｍservice作各model的调用处理，c只负责if else 逻辑，通过php 魔术方法_set,_get实现参数传递
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
<p>4 id分表规则</p>
<pre>
1 方法一
"table_".id%n; //n 表数量
2 方法二
 $str = crc32($id)
 if ($str < 0) {
  return "table_".substr(abs($str),0,1)
 }
 return "table_".substr($str,0,2) 
</pre>

## 4 php 函数、名词解释
### [rang](http://www.w3school.com.cn/php/func_array_range.asp) 
### [shuffle](http://www.w3school.com.cn/php/func_array_shuffle.asp)
### [str_shuffle](http://www.w3school.com.cn/php/func_string_str_shuffle.asp)
### [use 关键字用法详解](https://blog.csdn.net/wang740209668/article/details/52118289)
### [abstract](https://www.cnblogs.com/timelesszhuang/p/4720241.html)
### [clone]()
### [new static()/new self() 区别](https://www.cnblogs.com/shizqiang/p/6277091.html)
### [抽象类、接口的区别](https://blog.csdn.net/fanteathy/article/details/7309966)
### [反射](http://php.net/manual/zh/book.reflection.php)
### [反射类与实例化类的区别](https://segmentfault.com/q/1010000010809844?sort=created)
### [php 信息加密技术](https://www.cnblogs.com/nixi8/p/4926689.html) 
### [PHP openssl加密扩展使用总结](https://www.cnblogs.com/huyihao/p/6082765.html)
### [踩坑-php RSA加密传输代码示例](https://www.cnblogs.com/firstForEver/p/5803940.html)
### [php oenssl 函数](http://www.php.net/manual/zh/ref.openssl.php)
### [base64_encode/base64_decode 存在的意义](https://www.cnblogs.com/kenshinobiy/p/4421842.html)
### [php中urldecode()和urlencode()起什么作用？](https://blog.csdn.net/Aaroun/article/details/80859247)
### [instanceof 使用](https://www.cnblogs.com/tengjian/p/7999107.html)
<pre>
urlencode()编码：对字符串中除了 -_. 之外的所有非字母数字字符都将被替换成百分号（%）后跟两位十六进制数，空格则编码为加号（+）。
</pre>
### [负载均衡](https://blog.csdn.net/github_37515779/article/details/79953788)
### [负载均衡session共享方案](https://www.cnblogs.com/yangliheng/p/5852494.html)
### [高并发下mysql 脏数据解决方案](http://www.php.cn/mysql-tutorials-369221.html)
### [MySQL 中的共享锁和排他锁的用法](http://www.php.cn/mysql-tutorials-360687.html)
### [为什么要采用注册树模式](https://www.cnblogs.com/DeanChopper/p/4767181.html)
### [MySQL常见的三种存储引擎 InnoDB、MyISAM、MEMORY]（https://www.cnblogs.com/yuxiuyan/p/6511837.html)

## 5 设计模式
### (一) 简单工厂模式 
#### 应用场景：在不确定有多少种操作的时候；
#### 结构: 
<pre>1个工厂；
1个 interface 或者 abstract 产品父类；
多个实现 interface 或者继承 abstract 的具体产品类；
</pre>
#### 实例代码(Src\Service\Gc)
#### 缺点：违反开放封闭原则，对扩展开发，对修改封闭

### (二) 工厂方法模式 
#### 应用场景：要实例话的对象充满不确定性可能会改变的时候；要创建的对象的数目和类型是未知的；
#### 结构: 
<pre>
1个 interface 或者 abstract 产品父类；
多个实现 interface 或者继承 abstract 的具体产品类；

1个 interface 或者 abstract 工厂父类；
多个实现 interface 或者继承 abstract 的具体工厂类；
</pre>
#### 实例代码(Src\Service\Gcff)
#### 缺点：代码重复，单一接口实现或抽象类实现，又单独定义一个工厂，浪费


### (三) 抽象工厂模式 
#### 应用场景：要实例话的对象充满不确定性可能会改变的时候；要创建的对象的数目和类型是未知的；
#### 结构: 
<pre>
多个或1个 interface 或者 abstract 产品父类；
多个实现 interface 或者继承 abstract 的具体产品类；

1个 interface 或者 abstract 工厂父类；
1 个实现 interface 或者继承 abstract 的具体工厂类；
</pre>
#### 实例代码(Src\Service\Cxgc)
#### 描述：工厂方法模式诞生了好多工厂，每个产品创建一个工厂，其实有些产品，完全属于一个工厂，这样抽象工厂模式较工厂方法模式就更为合理了，关键点在于，这几个产品是否同属于这个工厂，换句话说，这个工厂能否同时生产这些商品，比如鞋子和帽子，肯定是不同的工厂，运动鞋和帆布鞋是同一个工厂，只是品类不一


### (四) 使用反射优化抽象工厂模式 
#### 应用场景：要实例话的对象充满不确定性可能会改变的时候；要创建的对象的数目和类型是未知的；
#### 结构: 
<pre>
多个或1个 interface 或者 abstract 产品父类；
多个实现 interface 或者继承 abstract 的具体产品类；

1个工厂
工厂里有多个方法，实现不同产品，具体功能
</pre>
#### 实例代码(Src\Service\reflection)
####

### (五)原型模式
#### 应用场景：某场景，需要多次实例化类一个类，使用 clone 对象来减少 new 对象的开销
#### 结构：function _clone () {.......}
#### 实例化的执行类的构造函数，clone 不执行
#### 实例代码 (Src\Service\clonems)--待写


### (六)适配器模式
#### 应用场景：
         1 老代码接口不适应新的接口需求，或者代码很多很乱不便于继续修改
         2家有一个两口的插座，但你买了一个电风扇需要三个口的，这个时候你就需要一个插排
#### 结构：
#####      1 目标(Target)角色：定义客户端使用的与特定领域相关的接口
#####      2 源(Adaptee)角色： 需要进行适配的接口
#####      3 适配器(Adapter)角色：对Adaptee的接口与Target接口进行适配；适配器是本模式的核心，适配器把源接口转换成目标接口
#### 实例代码(Src\Service\adapter)--待写


### (七)观察者模式
#### ：观察者模式，当一个对象状态发生变化时，依赖它的对象全部会收到通知，并自动更新。 
#### 应用场景：
         1 一个动作的改变，会联动一系列动作的改变，一个模块功能的改变，其它模块功能相应作出改变（一个事件发生后，要执行一连串更新操作。传统的编程方式，就是在事件的代码之后直接加入处理的逻辑。当更新的逻辑增多之后，代码会变得难以维护。这种方式是耦合的，侵入式的，增加新的逻辑需要修改事件的主体代码）
#### 结构：
#####      1 事件触发抽象类
#####      2 事件触发实现 
#####      3  观察者抽象类
#####      4 观察者实现
#### 实例代码(Src\Service\Observer)

### (八)注册模式
#### ：注册模式，解决全局共享和交换对象。已经创建好的对象，挂在到某个全局可以使用的数组上，在需要使用的时候，直接从该数组上获取即可。将对象注册到全局的树上。任何地方直接去访问。 
#### 应用场景：入口文件挂载类对象,一般结合其它设计模式共同使用
#### 实例代码(Src\Service\Register)










